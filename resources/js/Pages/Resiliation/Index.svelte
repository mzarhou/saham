<script context="module">
    import Layout from "@/Pages/Layouts/AdminLayout.svelte"
    export const layout = Layout
</script>

<script>
    import { Inertia } from "@inertiajs/inertia"
    import { inertia } from "@inertiajs/inertia-svelte"
    import { fade } from "svelte/transition";
    import dayjs from "dayjs"
    const route = window.route;

    export let resiliations = [];

    $: Resiliations = resiliations.map(r => {
        r.vehicule = r.contrat?.vehicule;
        r.client = r.contrat?.vehicule?.client;
        return r;
    });

    let searchValue = "";

    function handleSearch () {
        Inertia.get(
            route('resiliation.index') + '?search=' + searchValue
        );
    }

    $: Inertia.get(
            route('resiliation.index') + '?search=' + searchValue
        );
</script>

<div class="sm:px-8 container max-w-4xl px-4 mx-auto">
    <div class="py-8">
        <div class="sm:mb-0 flex flex-row items-center justify-between w-full mb-1">
            <h2 class="text-2xl leading-tight">Resiliation</h2>
            <div class="text-end">
                <form on:submit|preventDefault={handleSearch} class="flex items-center w-full max-w-sm space-x-3">
                    <div class=" relative">
                        <input bind:value={searchValue} type="text" class="focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-gray-100 rounded-lg shadow-sm appearance-none" placeholder="rechercher (nom, cin)"/>
                    </div>
                    <button type="submit" class="hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200 flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md">
                        Filtrer
                    </button>
                </form>
            </div>
        </div>
        <div class="sm:px-8 px-4 py-4 -mx-4 overflow-x-auto">
            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                Date
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                Nom
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                cin
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                montant
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                matricule
                            </th>
                        </tr>

                    </thead>
                    <tbody>
                        {#each Resiliations as resiliation, key}
                        <tr key={key} transition:fade={{ delay: 15 * key, duration: 200 }}>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {dayjs(resiliation.created_at).format("DD-MM-YYYY")}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <a href={route("gestion-clients.show", resiliation.client?.id)} use:inertia class="font-semibold text-gray-900 whitespace-no-wrap">
                                    {resiliation.client?.nom}
                                </a>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {resiliation.client?.cin}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="whitespace-no-wrap {resiliation?.montant <= 0 ? 'text-green-500' : 'text-red-500'}">
                                    {Math.abs(resiliation?.montant)} DH
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {resiliation.vehicule?.numero_immatriculation}
                                </p>
                            </td>
                        </tr>
                        {/each}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
