<script>
    import Modal from "@/Components/app/Modal.svelte";
    import SaveBtnModalContent from "./SaveBtnModalContent.svelte"

    let route = window.route;
</script>

<Modal on:open on:close let:close>
    <button slot="trigger" class="flex px-4 py-2 text-white bg-green-400 rounded-md justify-self-end">
        Enregistrer
        <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    </button>
    <SaveBtnModalContent closeModal={close} />
</Modal>
