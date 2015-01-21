<?php

class products extends Controller
{
    function payments(){
        var_dump($_REQUEST);
    }
    function buy()
    {
        $customer=$_POST['data'];
        $order_id=insert('order', $customer);
        $product_id = $this->params[0];
        $private_key = openssl_pkey_get_private("-----BEGIN RSA PRIVATE KEY-----
MIIEpAIBAAKCAQEAs2y5bWHGUgJfX9BcE6ShcBOSDhMjVirx+5BENmkaG2m5bbey
Re4n4wOaydocq6z5VlbQ5q0hJHwt5iSlz486XYYCTLhbHQQ3Ga82/2UpXaL1FHgI
WyBEV5gGcMB/xnF/0Gfb/4GqqCG2H5Q3pOGCEGkck6Xd2BiE1RStxZzOSqfOu+Sm
L8QvNvT6SHlg0sEMAALaB70wWpwBsCNBamOgqIlkftwwxpEadB1zdvgyDmCZe2fg
JgNQ5pH3NDnHJDxsa27g09UFQ7+HSkJ9Mmdc4xrol/TST3yzCzQyCYUf1ZUXdSup
l42QC7QLwkGtlyuL+iLS7ukOpj2No3OQc8bQswIDAQABAoIBAQCBpChi0UfTj6VL
/KfbBZQj//ADPW7F3ufTRY0T52MWtZBmp1knUAn/7GXWPUOEA8pwyO/ODQAqdZNQ
e+BWlX2tf5t/xaEH2Tja1RAe/wAhiRIeBRC8jxbyV4UnyN9KCk44ziJWfmFJdHo8
XQLLnqk0pE4inLErZ6PqtjNM2pzvsROCG3BmQPHgPpW1wRe6g5b6TSof69U8MqGR
2+VNNyhSgjZSIgBTjNOEXtWdb+DlB3ATIAOMfMqkOzwDy3QBa3k3X5nlgDk5bxur
nmPkKctQg/2rNdjT4WewiZET+o1ATHGfK5DSV7gu3WWl0qEJxLhjwS5Y+VcybsXC
Ia27tBpRAoGBAOdCqDrqCIhyQCgCa87Pgnck4A/mKZKQW7+USRSUgeXf/JQaBlu+
f7T4HDwjEwrps+6icSBW27rTduF6pmpcqALfAPvjj4ozl8Rih6aNWEhOsCdapnXa
0C6llIAfzvy/VZW3sEa6HB0ONvGLuhKzjdIkFYy3t50Z5v8tTu7cID7bAoGBAMae
fCvyHmlJupnR+jrRcNcdcpf6MrQy1xTv84urpsLg17fJ06wvRd5h3SVgrZo0OfEW
WG4peAZCN1S5JsN/iLh8QUD5JdLOwpQI7dO3jiPL6ltC2wDcIvbK5ZgHze2zkf1c
SysVlAkFH+ACNPuWdymg47ofsEs2yl3+0gUNvUEJAoGAQqD/20mGf9l7Bov8B6/d
xPoI3EvR+npBFOdiTt2it1pbaUg+QLyYCsnZSLJKUECZKM4AjfK4iBFZFQnDXK2p
cnpRzED6IDVRKrHAp4ndv6d8NTp270nF5UqriGahukxeGi68SQRiCTUJO3qod67n
0321/78G1eqalTa2oTcmyzUCgYEAnoYRzzVghmJdN7X6xQUyzc5oDtqXq3FEbyaQ
uLJY2AOCyOKiOjREzJhJXDLMfF4gvMY78DjS3hPte4aHZNOeeLhbkJMKWDXD4Uk7
IJbJMNLpCsvSZd5NXbJVC0F3X7fJ1nDaYdnIHGblqPG5/e96zlPmTkBKgc2KOPlQ
AM6VdZkCgYBgo7AME+CJL1rGvA68PniduLnFEEfGwr8F8qau1KynMhw8VcfQzg0W
OZi5kSsBExGTi5nIUaUSQkhKpUR4anGOq2f0XRm5+Y+D9WifKu+2LdEwh4F9Uu69
4Q3LbN2/W897h3++T7MQkjbpjUIpNMPHvNDLNYnZd6wcrIHAKGEb6Q==
-----END RSA PRIVATE KEY-----");
        $product_price=get_one("SELECT product_price FROM product WHERE product_id = $product_id");
        date_default_timezone_set('Europe/Tallinn');
        $fields = array(
            "VK_SERVICE" => "1011",
            "VK_VERSION" => "008",
            "VK_SND_ID" => "uid517797",
            "VK_STAMP" => "12345",
            "VK_AMOUNT" => "$product_price",
            "VK_CURR" => "EUR",
            "VK_ACC" => "EE871600161234567892",
            "VK_NAME" => "ÕIE MÄGER",
            "VK_REF" => "1234561",
            "VK_LANG" => "EST",
            "VK_MSG" => "Torso Tiger",
            "VK_RETURN" => BASE_URL.'orders/confirm/'.$order_id,
            "VK_CANCEL" => "http://diarainfra.com/cancel",
            "VK_DATETIME" => date("Y-m-d\TH:i:s+0200"),
            "VK_ENCODING" => "utf-8",
        );
        $data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
            str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
            str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid517797 */
            str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
            str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
            str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
            str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE871600161234567892 */
            str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* ÕIE MÄGER */
            str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
            str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
            str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* https://pangalink.net/project/548571ca15ba66ed1dff4770?payment_action=success */
            str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* https://pangalink.net/project/548571ca15ba66ed1dff4770?payment_action=cancel */
            str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2014-12-10T12:05:15+0200 */
        openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);
        $fields["VK_MAC"] = base64_encode($signature);
        $this->fields=$fields;
    }
    function index()
    {
        $this->products = get_all("SELECT * FROM product");
    }
    function view()
    {
        $product_id = $this->params[0];
        $this->product = get_first("SELECT * FROM product WHERE product_id = $product_id");
        //$this->banks = json_decode(file_get_contents("https://pangalink.net/api/banks?access_token=bf4d65f132ebac0da832b0a9f0d19ccaf4a52369"))->data;
    }
    function view_post()
    {
        $data = $_POST['data'];
        $message = '<pre>' . print_r($data, 1) . '<pre>';
        $message .= $data['customer_message'];
        echo "<pre>";
        print_r($data);
        insert('order', $data);
        send_mail(EMAIL_EMAIL, EMAIL_NAME, $data['customer_email'], $data['customer_name'], "Uus sõnum veebilehelt", $message);
        echo "</pre>";
    }
}
