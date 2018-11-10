<template>
    <div>
        <!--Hero-->
        <div class="hero hero-wavy is-relative is-theme-primary">
            <nav-bar theme="light"></nav-bar>
        </div>
    
        <!--Content-->
        <section class="section">
            <div class="section-title-wrapper">
                <div class="bg-number">
                    <i class="im im-icon-Lock-3"></i>
                </div>
                <h2 class="title section-title has-text-centered dark-text text-bold">
                    Privacy Policy
                </h2>
            </div>
            <br>
            <div class="columns">
                <div class="column is-8 is-offset-2">
                    <accordion title="Privacy Notice">
                        This privacy notice discloses the privacy practices for FIREAIOT.io. FIREAIOT complies  to the legislation of the Personal Data Protection Act 2010 in Malaysia, having an effect on November 2013. This privacy notice applies solely to information collected by this website. It will notify you of the following:

                        <ol>
                            <li>1. What personally identifiable information is collected from you through the website, how it is used and with whom it may be shared.</li>
                            <li>2. What choices are available to you regarding the use of your data.</li>
                            <li>3. The security procedures in place to protect the misuse of your information.</li>
                            <li>4. How you can correct any inaccuracies in the information.</li>
                        </ol>
                    </accordion>

                    <accordion title="Information Collection">
                        Information can be divided into two types:

                        1. Traffic Data: Traffic Data is anonymous information that does not personally identify you but is helpful for marketing purposes or for improving your experience on the Site, such as IP addresses, domain servers, and types of computers accessing the Site

                        2. Personal information: in the voluntarily process of registration, a user is required to give certain information (such as name and email address). This information is used to contact you about the products/services on our site in which you have expressed interest. At your option, you may also provide demographic information (such as gender or age) about yourself, but it is not required. If you communicate with us by e-mail, like us on Facebook, post messages to any of our social media, or complete online forms, surveys, or contest entries, any information provided in such communication may be collected as Personal Information.

                        We are the sole owners of the information collected on this site. We only have access to/collect information that you voluntarily give us via email or other direct contact from you.
                    </accordion>

                    <accordion title="Information Usage">
                        Having your consent, we may collect and use for the following purposes:
                        •	Verification & communication: to access FIREAIOT services and to respond to you, regarding the reason you contacted us. 
                        •	Promotions & Updates: to contact you via email in the future to tell you about specials, new products or services, or changes to this privacy policy. Unless you ask us not to
                        •	Personal Information Sharing: We share certain categories of information we collect from you in the ways described in this Privacy Policy. We share Data with advertisers and other third parties who may want to send you information about their products or services, unless you have specifically requested that we not share Contact Data with such parties. but we are not responsible for their privacy practices. If you do not want us to share your Contact Data with any third parties, please email us at info@FIREAIOT.io , but please understand that such a request will likely limit your ability to take advantage of all of the features and services we offer on the Site.
                    </accordion>

                    <accordion title="Your Access to and Control Over Information ">
                        You may opt out of any future contacts from us at any time. You can do the following at any time by contacting us via the email address or phone number given on our website:
                        •	See what data we have about you, if any.
                        •	Change/correct any data we have about you.
                        •	Have us delete any data we have about you.
                        •	Express any concern you have about our use of your data.
                    </accordion>

                    <accordion title="Security">
                        We take precautions to protect your information. When you submit sensitive information via the website, your information is protected both online and offline. unless such disclosure is necessary to: (a) comply with a court order or other legal process; (b) protect our rights or property; or (c) enforce our Terms of Service Wherever we collect sensitive information (such as credit card data), that information is encrypted and transmitted to us in a secure way. You can verify this by looking for a lock icon in the address bar and looking for "https" at the beginning of the address of the Web page.
                        While we use encryption to protect sensitive information transmitted online, we also protect your information offline. Only employees who need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable information. The computers/servers in which we store personally identifiable information are kept in a secure environment.
                        If you feel that we are not abiding by this privacy policy, you should contact us immediately via email at info@FIREAIOT.io
                    </accordion>
                </div>
            </div>
        </section>
        
        <!--footer-->
        <shared-footer></shared-footer>
    </div>
</template>

<script>
    import navBar from '../../components/NavBar'
    import Accordion from '../../components/Accordion'
    import sharedFooter from '../../components/SharedFooter'

    export default {
        components: {
            navBar,
            Accordion,
            sharedFooter,
        }
    }
</script>