<template>
    <div class="div"></div>
</template>

<script>
    export default {
        created() {
            window.Echo.channel('modpacks').listen('.ModpackUpdated', (e) => {
                window.$.niftyNoty({
                    type: "danger",
                    container: "floating",
                    title: "Test Message",
                    message: e.message,
                    closeBtn: false,
                    floating: {
                        position: "top-right",
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