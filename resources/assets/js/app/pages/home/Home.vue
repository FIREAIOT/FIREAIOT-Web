<template>
    <div>
       <hero></hero>

        <shared-footer></shared-footer>
    </div>
</template>

<script>
    import Hero from './components/Hero'
    import sharedFooter from '../../components/SharedFooter'

    export default {
        components: {
            Hero,
            sharedFooter
        }
    }
</script>