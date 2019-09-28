function store_networth() {
    var user_id = $("#userid").val();
    var networth = $("#_networth").text();
    var asset = $("#assetSum").text();
    var liability = $("#liabilitySum").text().slice(1);

    // console.log(networth);
    // console.log(asset);
    // console.log(liability);

    axios.get('./dashboard/store-networth.php', {
            params: {
                user_id: Number(user_id),
                networth: Number(networth),
                asset: Number(asset),
                liability: Number(liability)
            }
        })
        .then(function (response) {
            var res = response.data;
            console.log(res);
            if (res.status == "success") {
                console.log(res.message);
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}

function get_networth() {
    var user_id = $("#userid").val();
    axios.get('./dashboard/get-networth.php', {
            params: {
                user_id: Number(user_id),
            }
        })
        .then(function (response) {
            var res = response.data;
            console.log(res);
            if (res.status == "success") {
                display_networth(res.value);
                display_asset(res.asset);
                display_liability(res.liability);
            } else {
                console.log(res);
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}

function display_networth(networth) {
    $("#_networth").text(Number(networth).toFixed(2));
}

function display_asset(asset) {
    $("#assetSum").text(Number(asset).toFixed(2));
}

function display_liability(liability) {
    $("#liabilitySum").text("-" + Number(liability).toFixed(2));
}
