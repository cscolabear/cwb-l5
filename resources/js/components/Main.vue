<template>
    <div>
        <div class="row">
            <div class="col input-group">
                <select v-model="selected" class="custom-select m-w-140">
                    <option value="null" disabled selected>county choice</option>
                    <option v-for="(ch, en) in this.countys" :key="en" :value="ch">
                        {{ch}}
                    </option>
                </select>
                <div class="input-group-append">
                    <button
                        type="button"
                        class="btn btn-outline-primary"
                        :disabled="!selected"
                        @click="get">get!!</button>
                </div>
            </div>
        </div>
        <List class="row" :county="passSelected" />
    </div>
</template>

<script>
    import List from './List';

    export default {
        name: 'main-component',
        components: {
            List
        },
        data() {
            return {
                countys: {},
                selected: {},
                passSelected: '',
            };
        },
        created() {

        },
        mounted() {
            this.countys = window.countys;
            this.selected = null;
        },

        methods: {
            get() {
                if (!this.selected) {
                    return;
                }
                this.passSelected = this.selected;
            }
        },
    }

</script>

<style lang="scss" scoped>
    .m-w-140 {
        max-width: 140px;
    }

</style>
