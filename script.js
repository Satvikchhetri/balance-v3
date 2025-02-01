const selectedCurrency = document.getElementById('selected-currency');
const dropdownOptions = document.getElementById('dropdown-options');

// Toggle dropdown visibility
selectedCurrency.addEventListener('click', () => {
  dropdownOptions.classList.toggle('show');
});

// Update selected value
dropdownOptions.addEventListener('click', (e) => {
  if (e.target.classList.contains('option')) {
    selectedCurrency.textContent = e.target.textContent;
    dropdownOptions.classList.remove('show');
  }
});

// Close dropdown when clicking outside
document.addEventListener('click', (e) => {
  if (!e.target.closest('.custom-dropdown')) {
    dropdownOptions.classList.remove('show');
  }
});
