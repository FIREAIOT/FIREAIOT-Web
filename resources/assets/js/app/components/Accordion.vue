<template>
    <div class="single-toggle-wrapper">
        <div class="toggle-wrap">
            <span class="trigger" @click.prevent="isOpen = !isOpen">
                <a>
                    <i class="im im-icon-Add"></i>
                    <span class="is-size-5">{{ title }}</span>
                </a>
            </span>
            <div class="toggle-container" :class="{'hide': !isOpen}">
                <slot></slot>
            </div>
        </div>
        <br>
    </div>
</template>

<script>
export default {
    props: ['title'],
    data() {
        return {
            isOpen: false
        }
    }
}
</script>

<style>
.hide {
    display: none;
}
</style>
