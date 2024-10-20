$(document).ready(function () {
    $(".jam_checkbox").click(function () {
        let jam = [""];

        // Ambil semua checkbox yang dicentang
        $(".jam_checkbox:checked").each(function () {
            jam.push($(this).val());
        });

        $.ajax({
            url: "/user/job/filter",
            method: "GET",
            data: { jam: jam },
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
});
