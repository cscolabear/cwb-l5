<template>
    <div>
        <div class="col" v-show="county">
            {{ county }} 近三十六小時天氣預報
            <small>(update at: {{ apiUpdateAt }})</small>
                <br>

            <table class="table table-dark">
                <thead>
                    <tr>
                        <th class="ts">Time Scope</th>
                        <th class="wd">W Desc</th>
                        <th class="pop">PoP</th>
                        <th class="temperature">℃</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, timeString) in this.dataSet" :key="timeString">
                        <th>{{ timeString }}</th>
                        <td>
                            {{ item.Wx }}<br>{{ item.CI }}
                        </td>
                        <td>{{ item.PoP }} %</td>
                        <td>{{ item.MinT }} ℃ ~ {{ item.MaxT }} ℃</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <loading :active.sync="isLoading" :can-cancel="false" :is-full-page="false"></loading>
    </div>
</template>

<script>
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';

    export default {
        name: 'list-component',
        components: {
            Loading
        },
        props: ['county'],
        data() {
            return {
                isLoading: false,
                dataSet: {},
                apiUpdateAt: '',
            };
        },
        watch: {
            county(value, oldValue) {
                if (!value) {
                    return;
                }
                this.fetchByCounty(value);
            },
        },

        methods: {
            timeString(start, end) {
                return start.substr(5, start.length - 8) + // 2020-05-04 12:00:00 -> 05-04 12:00
                    ' ~ ' +
                    end.substr(5, end.length - 8);
            },
            reorg(records) {
                let dataSet = {};
                records.location[0].weatherElement.forEach(item => {
                    let timeString = '';
                    item.time.forEach(time => {
                        timeString = this.timeString(time.startTime, time.endTime);

                        if (!dataSet[timeString]) {
                            dataSet[timeString] = {};
                        }
                        dataSet[timeString][item.elementName] = time.parameter.parameterName;
                    });
                });
                return dataSet;
            },

            fetchByCounty(county) {
                this.isLoading = true;
                const url = '/api/cwb/' + county;
                axios.get(url)
                    .then(({
                        data
                    }) => {
                        this.dataSet = this.reorg(data.records);
                        this.apiUpdateAt = data.responseTime;
                        this.isLoading = false;
                    })
                    .catch((er) => {
                        console.log(er);
                    });
            }
        },
    }

</script>

<style lang="scss" scoped>
    .m-w-120 {
        max-width: 120px;
    }

    .ts {
        min-width: 260px;
    }

    .wd {
        min-width: 160px;
    }

    .temperature {
        min-width: 130px;
    }

</style>
