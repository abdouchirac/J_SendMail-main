Livewire.on("deleteTriggered", (id, first_name) => {
    const proceed = confirm(`Are you sure you want to delete ${first_name}`);

    if (proceed) {
        Livewire.emit("delete", id);
    }
});

Livewire.on("triggerCreate", () => {
    $("#user-modal").modal("show");
});

window.addEventListener("user-saved", (event) => {
    $("#user-modal").modal("hide");
    alert(`Users ${event.detail.user_first_name} was ${event.detail.action}!`);
});