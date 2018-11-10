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
                    Terms of Use
                </h2>
            </div>
            <br>
            <div class="columns">
                <div class="column is-8 is-offset-2">
                    <accordion title="Introduction">
                        These Website Standard Terms And Conditions (these “Terms” or these “Website Standard Terms And Conditions”) contained herein on this webpage, shall govern your use of this website, including all pages within this website (collectively referred to herein below as this “Website”). These Terms apply in full force and effect to your use of this Website and by using this Website, you expressly accept all terms and conditions contained herein in full. You must not use this Website, if you have any objection to any of these Website Standard Terms And Conditions. FIREAIOT.io trade name, trademark, logo, product and service marks belong to FIREAIOT.io. All other trade names, trademarks, logos, product or service marks mentioned herein belong to their respective owners.
                        This Website is not for use by any minors (defined as those who are not at least 18 years of age), and you must not use this Website if you a minor.
                    </accordion>

                    <accordion title="Intellectual Property Rights">
                        Other than content you own, which you may have opted to include on this Website, under these Terms, FIREAIOT.io and/or its licensors own all rights to the intellectual property and material contained in this Website, and all such rights are reserved.
                        You are granted a limited license only, subject to the restrictions provided in these Terms, for purposes of viewing the material contained on this Website.
                    </accordion>

                    <accordion title="Restrictions">
                        You are expressly and emphatically restricted from all of the following:
                        •	selling, sublicensing and/or otherwise commercializing any Website material;
                        •	using this Website in any way that is, or may be, damaging to this Website;
                        •	using this Website in any way that impacts user access to this Website;
                        •	using this Website contrary to applicable laws and regulations, or in a way that causes, or may cause, harm to the Website, or to any person or business entity;
                        •	engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website, or while using this Website;
                        •	using this Website to engage in any advertising or marketing; 

                        ---

                        Certain areas of this Website are restricted from access by you and FIREAIOT.io may further restrict access by you to any areas of this Website, at any time, in its sole and absolute discretion. Any user ID and password you may have for this Website are confidential and you must aintain confidentiality of such information.
                    </accordion>

                    <accordion title="Your Content">
                        In these Website Standard Terms And Conditions, “Your Content” shall mean any audio, video, text, images or other material you choose to display on this Website. With respect to Your Content, by displaying it, you grant FIREAIOT.io a non-exclusive, worldwide, irrevocable, royalty-free, sublicensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.
                        Your Content must be your own and must not be infringing on any third party’s rights. FIREAIOT.io reserves the right to remove any of Your Content from this Website at any time, and for any reason, without notice.
                    </accordion>

                    <accordion title="No warranties">
                        This Website is provided “as is,” with all faults, and FIREAIOT.io makes no express or implied representations or warranties, of any kind related to this Website or the materials contained on this Website. Additionally, nothing contained on this Website shall be construed as providing consult or advice to you.
                    </accordion>

                    <accordion title="Limitation of liability">
                        In no event shall FIREAIOT.io, nor any of its officers, directors and employees, be liable to you for anything arising out of or in any way connected with your use of this Website, whether such liability is under contract, tort or otherwise, and FIREAIOT.io, including its officers, directors and employees shall not be liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.
                    </accordion>

                    <accordion title="Indemnification">
                        You hereby indemnify to the fullest extent FIREAIOT.io from and against any and all liabilities, costs, demands, causes of action, damages and expenses (including reasonable attorney’s fees) arising out of or in any way related to your breach of any of the provisions of these Terms.
                    </accordion>

                    <accordion title="Severability">
                        If any provision of these Terms is found to be unenforceable or invalid under any applicable law, such unenforceability or invalidity shall not render these Terms unenforceable or invalid as a whole, and such provisions shall be deleted without affecting the remaining provisions herein.
                    </accordion>

                    <accordion title="Variation of Terms">
                        FIREAIOT.io reserves the right, as determined in our discretion, to update or revise these Terms of Usage at any time as it sees fit, and by using this Website you are expected to review such Terms on a regular basis to ensure you understand all terms and conditions governing use of this Website.
                    </accordion>

                    <accordion title="Assignment">
                        FIREAIOT.io shall be permitted to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification or consent required. However, .you shall not be permitted to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.
                    </accordion>

                    <accordion title="Entire Agreement">
                        These Terms, including any legal notices and disclaimers contained on this Website, constitute the entire agreement between FIREAIOT.io and you in relation to your use of this Website, and supersede all prior agreements and understandings with respect to the same.
                    </accordion>

                    <accordion title="Governing Law &amp; Jurisdiction">
                        These Terms will be governed by and construed in accordance with the laws of the State of Selangor, and you submit to the non-exclusive jurisdiction of the state and federal courts located in Selangor for the resolution of any disputes.
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