<script>
    import TypePaiement from "@/Components/app/TypePaiement.svelte"
    import { useForm } from "@inertiajs/inertia-svelte";

    export let closeModal;

    let options = [
        {
            text: "Espece",
            selected: true,
        },
        {
            text: "Cheque",
            selected: false,
        },
        {
            text: "Virement",
            selected: false,
        },
    ]

    export let credit = null;

    const form = useForm({
        montant: "",
        type_paiement: "",
        credit_id: credit?.id
    })


    function handleSubmit () {
        if (credit?.id != null) {
            $form.post(route("paiement.store"), {
                onSuccess() {
                    closeModal && closeModal();
                }
            });
        }

    }
</script>

<div
    class="bg-white rounded-lg shadow sm:max-w-md sm:w-full sm:mx-auto sm:overflow-hidden"
>
    <div class="px-4 py-8 sm:px-10">
        <div class="relative mt-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm leading-5">
                <span class="px-2 text-gray-500 bg-white">
                    Ajouter un paiement
                </span>
            </div>
        </div>
        <div class="mt-6">
            <form on:submit|preventDefault={handleSubmit} class="w-full space-y-6">
                <div class="w-full">
                    <div class="relative">
                        <TypePaiement bind:selectedValue={$form.type_paiement} options={options} />
                        {#if !!$form.errors.type_paiement}
                            <p class="text-red-500">{$form.errors.type_paiement}</p>
                        {/if}
                    </div>
                </div>
                <div class="w-full">
                    <div class="relative">
                        <input
                            bind:value={$form.montant}
                            type="text"
                            class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-gray-100 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            class:border-red-500={!!$form.errors.montant}
                            placeholder="Montant"
                        />
                        {#if !!$form.errors.montant}
                            <p class="text-red-500">{$form.errors.montant}</p>
                        {/if}
                    </div>
                </div>
                <div>
                    <span class="block w-full rounded-md shadow-sm">
                        <button
                            type="submit"
                            class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2"
                        >
                            Ajouter
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
