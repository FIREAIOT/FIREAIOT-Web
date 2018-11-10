<template>
    <div>
        <div class="field">
            <h5 class="is-size-4 mb-10 pt-30">
                <i class="im im-icon-Filter-2"></i> Status
            </h5>
            <div class="control">
                <ul>
                    <li class="mb-20 mt-20">
                        <!-- Radio -->
                        <label class="radio-wrap is-medium is-approved">
                            <input type="radio" class="b-radio" value="approved" v-model="currentStatus" checked>
                            <span></span>
                            Approved
                        </label>
                        <!-- /Radio -->
                    </li>
                    <li class="mb-20">
                        <!-- Radio -->
                        <label class="radio-wrap is-medium is-pending">
                            <input type="radio" class="b-radio" value="pending" v-model="currentStatus">
                            <span></span>
                            Pending
                        </label>
                        <!-- /Radio -->
                    </li>
                    <li class="mb-20">
                        <!-- Radio -->
                        <label class="radio-wrap is-medium is-completed">
                            <input type="radio" class="b-radio" value="completed" v-model="currentStatus">
                            <span></span>
                            Completed
                        </label>
                        <!-- /Radio -->
                    </li>
                    <li class="mb-20">
                        <!-- Radio -->
                        <label class="radio-wrap is-medium is-rejected">
                            <input type="radio" class="b-radio" value="rejected" v-model="currentStatus">
                            <span></span>
                            Rejected
                        </label>
                        <!-- /Radio -->
                    </li>
                    <li class="mb-20">
                        <!-- Radio -->
                        <label class="radio-wrap is-medium is-canceled">
                            <input type="radio" class="b-radio" value="canceled" v-model="currentStatus">
                            <span></span>
                            Canceled
                        </label>
                        <!-- /Radio -->
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapMutations, mapGetters } from 'vuex';

    export default {
        name: 'SideBar',
        methods: {
            ...mapActions('sessions', ['fetch']),
            ...mapMutations('sessions', ['setStatus']),
            fetchSessions() {
                const loadingComponent = this.$loading.open({ container: null })
                this.fetch()
                    .then(() => loadingComponent.close())
                    .catch(() => loadingComponent.close())
            }
        },
        watch: {
            mode(newValue) {
                this.fetchSessions()
            }
        },
        computed: {
            ...mapGetters('sessions', ['status']),
            ...mapGetters('mode', ['mode']),
            currentStatus: {
                get () {
                    return this.status
                },
                set (value) {
                    this.setStatus(value)
                    this.fetchSessions()
                }
            }
        },
        mounted() {
            this.fetchSessions()
        }
    }
</script>

<style lang="scss" scoped>
    .radio-wrap {
        padding: 0rem;
        // custom
        &.is-pending, &.is-canceled {
            input:checked + span::after {
                background: rgba(53, 70, 92, 1);
            }
        }
        &.is-approved {
            input:checked + span::after {
                background: rgba(3, 155, 229, 1);
            }
        }
        &.is-rejected {
            input:checked + span::after {
                background: rgba(255, 114, 115, 1);
            }
        }
        &.is-completed {
            input:checked + span::after {
                background: rgba(0, 178, 137, 1);
            }
        }
    }
</style>
