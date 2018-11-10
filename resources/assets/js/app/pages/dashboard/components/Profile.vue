<template>
    <div class="skype-card flex-card light-bordered light-raised padding-20" style="overflow: unset">
       <avatar :user="user"></avatar>
        <div class="skype-info">
            <div class="name">{{ user.name }}</div>
            <div class="name color-primary">@{{ user.username }}</div>
            <router-link v-if="user.isStudent" :to="{ name: 'upgradeAccount' }" class="button btn-outlined rounded secondary-btn is-small mt-10">Become a Tutor</router-link>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    name: 'Profile',
    computed: mapGetters('auth', ['user']),
}
</script>
