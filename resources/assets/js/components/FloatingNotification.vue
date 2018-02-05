<template>
    <div class="div">Test: {{ message }}</div>
</template>

<script>
    export default {
        data() {
            return {
                message : "",
            };
        },

        created() {
            console.log("started listening");
            window.Echo.channel('modpacks').listen('IetsAnders', e => {
                console.log('Got it');
                this.message = e.message;
            });
        }


    }
</script>