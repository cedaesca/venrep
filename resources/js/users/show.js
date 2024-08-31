const handleReputationFilter = () => {
    const $filterSelect = document.getElementById('filter-type');

    $filterSelect.addEventListener('change', () => {
        const selectedValue = $filterSelect.value;
        const url = new URL(window.location.href);
        
        if (selectedValue === "") {
            url.searchParams.delete('filter');
        } else {
            url.searchParams.set('filter', selectedValue);
        }

        window.location.href = url;
    });
}

document.addEventListener('DOMContentLoaded', () => {
    handleReputationFilter();
});