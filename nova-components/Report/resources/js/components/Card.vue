<template>
    <card class="flex items-center">
        <div class="px-3 py-3">
            <p class="mb-2 dim text-80 font-bold">Enter an email address to send mail.</p>
            <input type="text" class="w-full form-control form-input form-input-bordered" v-model="email">
            <div class="flex items-center mt-3" v-if=" ! loading">
                <a @click="sendEmail()" class="btn btn-default btn-primary">Send the email</a>
            </div>
            <div class="mt-3" v-if="loading">
                <span class="font-bold dim text-80">Your email is being sent.</span>
            </div>
        </div>
    </card>
</template>


<script>
export default {
    props: [
        'card',

        // The following props are only available on resource detail cards...
        // 'resource',
        // 'resourceId',
        // 'resourceName',
    ],

    mounted() {
        //
    },
}
</script>
