<?php
require_once('../includes/db_connect.php');

if (isset($_GET['reference']) && isset($_GET['id'])) {
    $reference = $_GET['reference'];
    $project_id = $_GET['id'];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer sk_test_a3e3f65e9bdb6f77dd2b045453a72c8ed6bf2ced",
            "Cache-Control: no-cache"
        )
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        die("cURL Error: " . $err);
    }

    $result = json_decode($response, true);

    if ($result && $result['status'] == true) {
        $amount_paid = $result['data']['amount'] / 100;

        $update_query = "UPDATE projects SET raised = raised + ? WHERE id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("di", $amount_paid, $project_id);
        if ($stmt->execute()) {
            echo "Payment verified and project updated successfully!";

        } else {
            echo "Failed to update the project.";
        }

        $stmt->close();
    } else {
        echo "Payment verification failed.";
    }
} else {
    echo "No reference or project ID provided.";
}
?>