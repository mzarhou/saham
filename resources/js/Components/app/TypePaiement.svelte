<script>
    import Dropdown from "@/Components/app/Dropdown.svelte";

    export let selectedValue = null;
    export let className = "";

    export let options = [
        {
            text: "Espece",
            selected: false,
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
</script>

<Dropdown bind:selectedValue={selectedValue} bind:options placeHolder="Type de paiement" className="mb-4 {className}" />
