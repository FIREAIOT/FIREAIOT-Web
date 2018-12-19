<template>
    <div class="task-card" :class="'is-' + data.status">
        <div class="card-inner">
            <div class="task-meta">
                <div class="task-members is-flex is-row">
                    <div class="mr-20">
                        <avatar v-if="data.type == 'student'" :hideAccountBadge="true" :user="data.tutor"></avatar>
                        <avatar v-if="data.type == 'tutor'" :hideAccountBadge="true" :user="data.student"></avatar>
                    </div>
                    <div>
                        <span v-if="data.type == 'student'" class="task-title">Tutor: {{ data.tutor.name }}</span>
                        <span v-if="data.type == 'tutor'" class="task-title">Student: {{ data.student.name }}</span>
                        <span class="task-due-date">
                            Course: {{ data.course.name }} ({{ data.course.code }})
                        </span>
                    </div>
                </div>
            </div>
            <div class="task-info">
                <div class="subtasks-count">
                    <span>{{ data.hours }} hr</span>
                </div>
                
                <a class="button btn-square rounded ml-5 btn-outlined">
                    <i class="im im-icon-Eye-Visible"></i>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions } from 'vuex';

    export default {
        props: ['data']
    }
</script>

<style lang="scss" scoped>
.task-card {
    border: 1px solid rgba(0,0,0,.06);
}
@media (min-width: 768px) {
    .task-card {
        transition: all 0.3s;
        cursor: pointer;
        &:hover {
            transform: translateY(-5px);
            box-shadow: 0 3px 10px 4px rgba(0,0,0,.04);
        }
        &.is-pending, &.is-canceled {
            border-left: 5px solid rgba(53, 70, 92, 0.2);
            &:hover {
                border-left: 5px solid rgba(53, 70, 92, 1);
            }
        }
        &.is-approved {
            border-left: 5px solid rgba(3, 155, 229, 0.2);
            &:hover {
                border-left: 5px solid rgba(3, 155, 229, 1);
            }
        }
        &.is-rejected {
            border-left: 5px solid rgba(255, 114, 115, 0.2);
            &:hover {
                border-left: 5px solid rgba(255, 114, 115, 1);
            }
        }
        &.is-completed {
            border-left: 5px solid rgba(0, 178, 137, 0.2);
            &:hover {
                border-left: 5px solid rgba(0, 178, 137, 1);
            }
        }
    }
}
</style>


