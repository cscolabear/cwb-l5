<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    i am    {{mytest}}
                    <div class="card-header" @click="click()">display!</div>
                    <div id="selector">
                        <select v-model="selected">
                            <option v-for="(item, key) in this.list"
                            :key="key"
                             :value="item"
                            >
                                {{item.id}}. {{item.title}}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                mytest: 'COLA',
                list: [],
                selected: {},
            };
        },
        mounted() {
            console.log('Component mounted.')
            this.test();
        },

        methods: {
            test() {
                console.log('in test');
                this.list = window.linkList;
                console.log(this.list);
            },

            click() {
                console.log('on click');
                console.log(this.selected);
            }
        },
    }

</script>

<style lang="scss" scoped>
    .card-header {
        background-color: blanchedalmond;

        &:hover {
            background-color: #f5f5f5;
        }
    }

</style>
