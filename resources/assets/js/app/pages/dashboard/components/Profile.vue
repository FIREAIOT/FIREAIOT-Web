<template>
    <div class="skype-card flex-card light-bordered light-raised padding-20" style="overflow: unset">
       <avatar :user="user"></avatar>
        <div class="skype-info">
            <div class="name color-primary">@{{ user.name }}</div>
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
