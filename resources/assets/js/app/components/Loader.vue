<template>
    <origami v-if="isLoading" size="100"></origami>
</template>

<script>
    import { mapGetters } from 'vuex';
    import { Origami } from 'vue-loading-spinner';

    export default {
        computed: mapGetters('loading', ['isLoading']),
        components: {
            Origami
        }
    }
</script>