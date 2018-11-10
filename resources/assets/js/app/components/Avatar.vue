<template>
    <b-tooltip :label="accountBadge.label" type="is-dark" position="is-top">
        <div class="gravatar">
            <img :src="user.avatar" alt="avatar"/>
            <i v-if="! hideAccountBadge" :class="accountBadge.icon" :style="{ 'background': accountBadge.color }"></i>
        </div>
    </b-tooltip>
</template>

<script>
    export default {
        props: ['user', 'hideAccountBadge'],
        computed: {
            isVerifiedTutor() {
                if(this.hideAccountBadge) { return  }

                return this.user.roles.includes('tutor')
            },
            isTutor() {
                if(this.hideAccountBadge) { return  }

                return this.isVerifiedTutor || this.user.roles.includes('notVerifiedTutor')
            },
            isStudent() {
                if(this.hideAccountBadge) { return  }

                return this.user.roles.includes('student') && ! this.isTutor
            },
            accountBadge() {
                let verfifiedTutorBadge = {icon: 'fa fa-check', color: '#3fab81', label: 'Verified Tutor'}
                let tutorBadge = {icon: 'fa fa-check', color: '#8898aa', label: 'Tutor'}
                let studentBadge = {icon: 'fa fa-check', color: '#3498da', label: 'Student'}
                let noneBadge = {icon: '', color: '#3498da', label: ''}

                // stupid code => change later!!
                if(this.hideAccountBadge) { return noneBadge }

                if(this.isVerifiedTutor) {
                    return verfifiedTutorBadge
                }else if(this.isTutor) {
                    return tutorBadge
                }else if(this.isStudent) {
                    return studentBadge
                }
                
                return noneBadge
            }
        }
    }
</script>

<style>
    .gravatar {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .gravatar > img {
        position: relative;
        border-radius: 50% !important;
        box-shadow: -1px 3px 10px 0 rgba(0,0,0,.1);
        overflow: hidden;
        width: 100px !important;
        height: 100px !important;
    }

    .gravatar > i {
        position: absolute;
        font-size: 1rem;
        margin-left: 40px;
        margin-top: 30px;
        padding: 10px;
        background: #039BE5;
        border-radius: 50%;
        color: #fff;
    }
</style>