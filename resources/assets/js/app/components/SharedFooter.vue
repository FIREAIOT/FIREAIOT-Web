<template>
    <!-- Simple light footer -->
    <footer class="footer footer-light-medium" style="padding-top: 3rem !important; padding-bottom: 3rem !important; border-top: 1px solid #eaeaea">
        <div class="container">
            <div class="columns">
                <!-- Column -->
                <div class="column is-4">
                    <div class="pt-10 pb-10">
                        <img class="medium-footer-logo" src="/images/logo.png" alt="MySenior logo">
                        <div class="footer-description pt-10 pb-10">
                            Autonomous IoT-based Firefighting UAV
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="column is-6 is-offset-2">
                    <div class="columns">
                        
                        <!-- Column -->
                        <div class="column">
                            <ul class="footer-column">
                                <li class="column-header">
                                    FIREAIOT
                                </li>
                                <router-link tag="li" :to="{ name: 'home' }" class="column-item"><a href="#">How it works?</a></router-link>
                                <router-link tag="li" :to="{ name: 'home' }" class="column-item"><a href="#">Contact us</a></router-link>
                                <router-link tag="li" :to="{ name: 'home' }" class="column-item"><a href="#">Host your drone</a></router-link>
                            </ul>
                        </div>
                        <!-- Column -->
                        <div class="column">
                            <ul class="footer-column">
                                <li class="column-header">
                                    Meta
                                </li>
                                <router-link tag="li" :to="{ name: 'home' }" class="column-item"><a href="#">FAQ</a></router-link>
                                <router-link tag="li" :to="{ name: 'home' }" class="column-item"><a href="#">Terms of Use</a></router-link>
                                <router-link tag="li" :to="{ name: 'home' }" class="column-item"><a href="#">Privacy Policy</a></router-link>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /Simple light footer -->
</template>

<script>
    export default {
        name: "SharedFooter"
    }
</script>

<style scoped>

</style>