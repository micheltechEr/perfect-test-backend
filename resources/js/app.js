import './bootstrap';
flatpickr(".date_range", {
            mode: "range", // Habilita o modo de intervalo de datas (início e fim)
            dateFormat: "d/m/Y", // Formato que o usuário vê (ex: 29/09/2025)
            locale: "pt" // (Opcional) Traduz para português, precisa de um script extra
        });