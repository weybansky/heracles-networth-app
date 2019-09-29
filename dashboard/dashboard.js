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


function store_item(input) {
    var user_id = $("#userid").val();
    var type = input.target.className;
    var name = input.target.name;
    var value = input.target.value;

    if (type == '_liability') { type = 'liability'; }

    if (value == '' || value == null) { value = 0; }

    axios.get('./dashboard/store-item.php', {
            params: {
                user_id: user_id,
                type: type,
                name: name,
                value: value,
            }
        })
        .then(function (response) {
            console.log(response.data);
        })
        .catch(function (error) {
            console.log(error);
        });
}


function get_items() {
    var user_id = $("#userid").val();

    axios.get('./dashboard/get-items.php', {
            params: {
                user_id: user_id,
            }
        })
        .then(function (response) {
            var items = response.data.items;
            console.log(items);
            for (var i = 0; i < items.length; i++) {
                var value = items[i].value;
                if (value == '' || value == null) {
                    value = 0;
                }
                document.getElementsByName(items[i].name)[0].value = value;
            }
            inputValidate();
            liabilityValidate();
            displayNetworth();
        })
        .catch(function (error) {
            console.log(error);
        });
}

function get_itemsaaa() {
    axios.get('get-items.php', {
            params: {
                user_id: 3,
                type: type,
            }
        })
        .then(function (response) {
            var res = response.data;
            console.log(res);
            if (res.status == "success") {
                // update the networth in view
                if (res.type == "liability") {
                    display_liability(res.liability);
                } else if (res.type == "asset") {
                    display_asset(res.asset);
                }
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}