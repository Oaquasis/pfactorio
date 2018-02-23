<template>
    <div class="div"></div>
</template>

<script>
    export default {
        created() {
            window.Echo.channel('pf_notifications')
                .listen('.notify', (e) => {
                    window.$.niftyNoty({
                        type: e.type,
                        container: "floating",
                        title: e.title,
                        message: e.message,
                        closeBtn: false,
                        floating: {
                            position: "bottom-right",
                            animationIn: "bounceInDown",
                            animationOut: "fadeOud"
                        },
                        focus: true,
                        timer: 2500
                    });
            });
        }
    }
</script>