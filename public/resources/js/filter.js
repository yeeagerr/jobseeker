$(document).ready(function () {
    $(".filter_checkbox").click(function () {
        // Ambil setiap kategori filter sebagai array
        let jam = getCheckedValues("jam_checkbox");
        let tingkat = getCheckedValues("tingkat_checkbox");
        let tipe = getCheckedValues("tipe_checkbox");

        // Lakukan AJAX request dengan semua filter
        $.ajax({
            url: "/user/job/filter",
            method: "GET",
            data: {
                jam: jam,
                tingkat: tingkat,
                tipe: tipe,
            },
            success: function (response) {
                $("#list_job").empty(); // Kosongkan div sebelum render ulang
                if (response.html) {
                    $("#list_job").html(response.html); // Render hasil
                } else {
                    $("#list_job").html(
                        "<p>Tidak ada pekerjaan ditemukan.</p>"
                    );
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText); // Tampilkan error di console
                $("#list_job").html(
                    "<p>Terjadi kesalahan saat memuat data.</p>"
                );
            },
        });
    });

    // Fungsi untuk mendapatkan nilai checkbox yang dicentang dari kategori tertentu
    function getCheckedValues(className) {
        let values = [""];
        $("." + className + ":checked").each(function () {
            values.push($(this).val());
        });
        return values;
    }
});
