<template>
    <b-tooltip :label="accountBadge.label" type="is-dark" position="is-top">
        <div class="gravatar">
            <img :src="user.avatar" alt="avatar"/>
        </div>
    </b-tooltip>
</template>

<script>
    export default {
        props: ['user', 'hideAccountBadge'],
        computed: {
            accountBadge() {
                return {icon: 'fa fa-check', color: '#3fab81', label: 'Verified Tutor'}
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