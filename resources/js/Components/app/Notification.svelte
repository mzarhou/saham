<script>
    import { page } from '@inertiajs/inertia-svelte'
    import { onMount } from 'svelte';

    const colors = ["bg-green-500", "bg-blue-500", "bg-red-500"]
    let color = colors[$page.props.flash.message_level - 1] || colors[0];

    onMount(() => setTimeout(hide, 3000));

    function hide () {
       show = false;
    }

    function hideAfter () {
        setTimeout(() => show = false, 2000);
    }

    let show = true;
    $: {
        $page.props.flash;
        show = true;
        if ($page.props.flash.message) {
            hideAfter();
        }
    }
</script>

{#if $page.props.flash.message && show}
<div class="absolute inset-x-0 top-0 flex items-center px-4 py-3 text-sm font-bold text-white {color} notification" role="alert">
    <svg width="20" height="20" fill="currentColor" class="w-4 h-4 mr-2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
        <path d="M1216 1344v128q0 26-19 45t-45 19h-512q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h64v-384h-64q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h384q26 0 45 19t19 45v576h64q26 0 45 19t19 45zm-128-1152v192q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-192q0-26 19-45t45-19h256q26 0 45 19t19 45z">
        </path>
    </svg>
    <p>
        {$page.props.flash.message}
    </p>
    <button class="absolute top-0 bottom-0 right-0 px-4 py-3" on:click={hide}>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6 text-white" viewBox="0 0 1792 1792">
            <path d="M1490 1322q0 40-28 68l-136 136q-28 28-68 28t-68-28l-294-294-294 294q-28 28-68 28t-68-28l-136-136q-28-28-28-68t28-68l294-294-294-294q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 294 294-294q28-28 68-28t68 28l136 136q28 28 28 68t-28 68l-294 294 294 294q28 28 28 68z">
            </path>
        </svg>
    </button>
</div>
{/if}

<style>
    .notification {
        z-index: 1000;
        width: 100vw;
    }
</style>
