import { throttle } from 'lodash'

export default {
    template: '<div></div>',

    props: ['container'],

    mounted() {
        window.addEventListener('scroll', this.loadMore)
    },

    destroyed() {
        window.removeEventListener('scroll', this.loadMore)
    },

    methods: {
        loadMore: throttle(function() {
            if(this.shouldLoadMore()) {
                this.$emit('ready')
            }
        }, 300),

        shouldLoadMore() {
            let containerHieght = $(this.container).height();

            let distanceFromWindowTop = $(this.container).offset().top;

            return window.pageYOffset >= (containerHieght + distanceFromWindowTop) * 0.3
        }
    }
}