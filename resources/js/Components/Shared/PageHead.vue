<script setup>
import {Head} from "@inertiajs/vue3";
</script>

<script>
export default {
    props: {
        pageTitle: String,
        url: String,
        description: String,
        cover: String,
    },
};
</script>

<template>
    <Head>
        <title>{{ pageTitle }}</title>

        <meta :content="pageTitle" name="title"/>
        <meta :content="description" name="description"/>

        <meta content="website" property="og:type"/>
        <meta :content="url" property="og:url"/>
        <meta :content="pageTitle" property="og:title"/>
        <meta :content="description" property="og:description"/>
        <meta v-if="cover" :content="cover" property="og:image" inertia="og:image" >
        <link v-if="cover" rel="icon" type="image/svg+xml" :href="cover" />
        <meta content="summary_large_image" property="twitter:card"/>
        <meta :content="url" property="twitter:url"/>
        <meta :content="pageTitle" property="twitter:title"/>
        <meta :content="description" property="twitter:description"/>
        <meta v-if="cover" :content="cover" property="twitter:image">
    </Head>
</template>