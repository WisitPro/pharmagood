<?php
class m_reports extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    // public function IncomeReports($data)
    // {

    //     $day1 = isset($data['day1']) ? $data['day1'] : null;
    //     $day2 = isset($data['day2']) ? $data['day2'] : null;
    //     $product_type = isset($data['product_type']) ? $data['product_type'] : null;
    //     $pro_id = isset($data['pro_id']) ? $data['pro_id'] : null;
    //     if ($day1 == null && $day2 == null && $product_type == null && $pro_id !=null) {
    //         $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
    //         FROM tbl_payprove p
    //         JOIN tbl_order o ON p.order_id = o.order_id
    //         JOIN tbl_orderlist ol ON o.order_id = ol.order_id
    //         JOIN tbl_product pd ON ol.pro_id = pd.pro_id
    //         WHERE p.prove_status != 'ยกเลิก' AND p.prove_status != 'ยังไม่ชำระเงิน' AND p.prove_status != 'รอการยืนยัน'
    //         AND pd.pro_id = '$pro_id'
    //         GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC";
    //     }elseif ($day1 != null && $day2 == null && $product_type == null && $pro_id !=null) {
    //         $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
    //         FROM tbl_payprove p
    //         JOIN tbl_order o ON p.order_id = o.order_id
    //         JOIN tbl_orderlist ol ON o.order_id = ol.order_id
    //         JOIN tbl_product pd ON ol.pro_id = pd.pro_id
    //         WHERE p.prove_status != 'ยกเลิก' AND p.prove_status != 'ยังไม่ชำระเงิน' AND p.prove_status != 'รอการยืนยัน'
    //         AND pd.pro_id = '$pro_id' AND DATE(p.pay_datetime) = '$day1'
    //         GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC";
    //     }elseif ($day1 == null && $day2 != null && $product_type == null && $pro_id !=null) {
    //         $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
    //         FROM tbl_payprove p
    //         JOIN tbl_order o ON p.order_id = o.order_id
    //         JOIN tbl_orderlist ol ON o.order_id = ol.order_id
    //         JOIN tbl_product pd ON ol.pro_id = pd.pro_id
    //         WHERE p.prove_status != 'ยกเลิก' AND p.prove_status != 'ยังไม่ชำระเงิน' AND p.prove_status != 'รอการยืนยัน'
    //         AND pd.pro_id = '$pro_id' AND DATE(p.pay_datetime) = '$day2'
    //         GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC";
    //     }elseif ($day1 == $day2  && $product_type == null && $pro_id !=null) {
    //         $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
    //         FROM tbl_payprove p
    //         JOIN tbl_order o ON p.order_id = o.order_id
    //         JOIN tbl_orderlist ol ON o.order_id = ol.order_id
    //         JOIN tbl_product pd ON ol.pro_id = pd.pro_id
    //         WHERE p.prove_status != 'ยกเลิก' AND p.prove_status != 'ยังไม่ชำระเงิน' AND p.prove_status != 'รอการยืนยัน'
    //         AND pd.pro_id = '$pro_id' AND DATE(p.pay_datetime) = '$day1'
    //         GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC";
    //     }elseif ($day1 !=null && $day2 !=null  && $product_type == null && $pro_id !=null) {
    //         $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
    //         FROM tbl_payprove p
    //         JOIN tbl_order o ON p.order_id = o.order_id
    //         JOIN tbl_orderlist ol ON o.order_id = ol.order_id
    //         JOIN tbl_product pd ON ol.pro_id = pd.pro_id
    //         WHERE p.prove_status != 'ยกเลิก' AND p.prove_status != 'ยังไม่ชำระเงิน' AND p.prove_status != 'รอการยืนยัน'
    //         AND pd.pro_id = '$pro_id' AND p.pay_datetime between '$day1+00:00:00' and '$day2+23:59:59'
    //         GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC";
    //     } elseif ($day1 == null && $day2 == null && $product_type == null) {
    //         $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
    //         FROM tbl_payprove p
    //         JOIN tbl_order o ON p.order_id = o.order_id
    //         JOIN tbl_orderlist ol ON o.order_id = ol.order_id
    //         JOIN tbl_product pd ON ol.pro_id = pd.pro_id
    //         WHERE p.prove_status != 'ยกเลิก' AND p.prove_status != 'ยังไม่ชำระเงิน' AND p.prove_status != 'รอการยืนยัน'
    //         GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC";
    //     } elseif ($day1 == null && $day2 == null && $product_type != null) {
    //         $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
    //         FROM tbl_payprove p
    //         JOIN tbl_order o ON p.order_id = o.order_id
    //         JOIN tbl_orderlist ol ON o.order_id = ol.order_id
    //         JOIN tbl_product pd ON ol.pro_id = pd.pro_id
    //         WHERE pd.type_id = '$product_type' AND p.prove_status != 'ยกเลิก' AND p.prove_status != 'ยังไม่ชำระเงิน' AND p.prove_status != 'รอการยืนยัน'
    //         GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC";
    //     } elseif ($day1 == $day2 || $day2 == $day1 && $product_type == null) {
    //         $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
    //         FROM tbl_payprove p
    //         JOIN tbl_order o ON p.order_id = o.order_id
    //         JOIN tbl_orderlist ol ON o.order_id = ol.order_id
    //         JOIN tbl_product pd ON ol.pro_id = pd.pro_id
    //         WHERE p.prove_status != 'ยกเลิก' AND p.prove_status != 'ยังไม่ชำระเงิน' AND p.prove_status != 'รอการยืนยัน' AND DATE(p.pay_datetime) = '$day1'
    //         GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC";
    //     } elseif ($product_type != null && $day2 == null) {
    //         $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
    //         FROM tbl_payprove p
    //         JOIN tbl_order o ON p.order_id = o.order_id
    //         JOIN tbl_orderlist ol ON o.order_id = ol.order_id
    //         JOIN tbl_product pd ON ol.pro_id = pd.pro_id
    //         WHERE pd.type_id = '$product_type' AND p.prove_status != 'ยกเลิก' AND p.prove_status != 'ยังไม่ชำระเงิน' and p.prove_status !='รอการยืนยัน'AND DATE(p.pay_datetime) = '$day1'
    //         GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC";
    //     } elseif ($product_type != null && $day1 == $day2) {
    //         $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
    //         FROM tbl_payprove p
    //         JOIN tbl_order o ON p.order_id = o.order_id
    //         JOIN tbl_orderlist ol ON o.order_id = ol.order_id
    //         JOIN tbl_product pd ON ol.pro_id = pd.pro_id
    //         WHERE pd.type_id = '$product_type' AND p.prove_status != 'ยกเลิก' AND p.prove_status != 'ยังไม่ชำระเงิน' and p.prove_status !='รอการยืนยัน'AND DATE(p.pay_datetime) = '$day1'
    //         GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC";
    //     } elseif ($product_type != null && $day2 != null) {
    //         $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
    //         FROM tbl_payprove p
    //         JOIN tbl_order o ON p.order_id = o.order_id
    //         JOIN tbl_orderlist ol ON o.order_id = ol.order_id
    //         JOIN tbl_product pd ON ol.pro_id = pd.pro_id
    //         WHERE pd.type_id = '$product_type' AND p.prove_status != 'ยกเลิก' AND p.prove_status != 'ยังไม่ชำระเงิน' and p.prove_status !='รอการยืนยัน' 
    //         AND p.pay_datetime between '$day1+00:00:00' and '$day2+23:59:59'
    //         GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC";
    //     } elseif ($day1 != null && $day2 != null && $product_type == null) {
    //         $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
    //         FROM tbl_payprove p
    //         JOIN tbl_order o ON p.order_id = o.order_id
    //         JOIN tbl_orderlist ol ON o.order_id = ol.order_id
    //         JOIN tbl_product pd ON ol.pro_id = pd.pro_id
    //         WHERE p.prove_status != 'ยกเลิก' AND p.prove_status != 'ยังไม่ชำระเงิน' and p.prove_status !='รอการยืนยัน' 
    //         and p.pay_datetime between '$day1+00:00:00' and '$day2+23:59:59'
    //         GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC";
    //     } elseif ($day1 !=null && $day2 == null && $product_type == null) {
    //         $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
    //         FROM tbl_payprove p
    //         JOIN tbl_order o ON p.order_id = o.order_id
    //         JOIN tbl_orderlist ol ON o.order_id = ol.order_id
    //         JOIN tbl_product pd ON ol.pro_id = pd.pro_id
    //         WHERE p.prove_status != 'ยกเลิก' AND p.prove_status != 'ยังไม่ชำระเงิน' AND p.prove_status != 'รอการยืนยัน' AND DATE(p.pay_datetime) = '$day1'
    //         GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC";
    //     } elseif ($day1 == null && $day2 != null && $product_type == null) {
    //         $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
    //         FROM tbl_payprove p
    //         JOIN tbl_order o ON p.order_id = o.order_id
    //         JOIN tbl_orderlist ol ON o.order_id = ol.order_id
    //         JOIN tbl_product pd ON ol.pro_id = pd.pro_id
    //         WHERE p.prove_status != 'ยกเลิก' AND p.prove_status != 'ยังไม่ชำระเงิน' AND p.prove_status != 'รอการยืนยัน' AND DATE(p.pay_datetime) = '$day2'
    //         GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC";
    //     } elseif ($day1 == null && $day2 != null && $product_type != null) {
    //         $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
    //         FROM tbl_payprove p
    //         JOIN tbl_order o ON p.order_id = o.order_id
    //         JOIN tbl_orderlist ol ON o.order_id = ol.order_id
    //         JOIN tbl_product pd ON ol.pro_id = pd.pro_id
    //         WHERE pd.type_id = '$product_type' AND p.prove_status != 'ยกเลิก' AND p.prove_status != 'ยังไม่ชำระเงิน' AND p.prove_status != 'รอการยืนยัน' AND DATE(p.pay_datetime) = '$day2'
    //         GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC";
    //     }

    //     $qr = $this->db->query($sql);
    //     return $qr->result();
    // }
    public function IncomeReports($data)
    {

        $day1 = isset($data['day1']) ? $data['day1'] : null;
        $day2 = isset($data['day2']) ? $data['day2'] : null;
        $product_type = isset($data['product_type']) ? $data['product_type'] : null;
        $pro_id = isset($data['pro_id']) ? $data['pro_id'] : null;
        $pro_unit =  isset($data['pro_unit']) ? $data['pro_unit'] : null;

        $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
        FROM tbl_payprove p
        JOIN tbl_order o ON p.order_id = o.order_id
        JOIN tbl_orderlist ol ON o.order_id = ol.order_id
        JOIN tbl_product pd ON ol.pro_id = pd.pro_id
        WHERE ";

        $conditions = [];

        if (!empty($day1) && !empty($day2)) {
            if ($day1 == $day2) {
                $conditions[] = "DATE(p.pay_datetime) = '$day1'";
            } else {
                $conditions[] = "DATE(p.pay_datetime) BETWEEN '$day1+00:00:00' AND '$day2+23:59:59'";
            }
        } elseif (!empty($day1)) {
            $conditions[] = "DATE(p.pay_datetime) = '$day1'";
        } elseif (!empty($day2)) {
            $conditions[] = "DATE(p.pay_datetime) = '$day2'";
        }

        if (!empty($product_type)) {
            $conditions[] = "pd.type_id = '$product_type'";
        }

        if (!empty($pro_id)) {
            $conditions[] = "ol.pro_id = '$pro_id'";
        }

        if (!empty($pro_unit)) {
            $conditions[] = "pd.pro_unit = '$pro_unit'";
        }


        if (!empty($conditions)) {
            $sql .= implode(' AND ', $conditions) . ' GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC';
        } else {
            $sql = "SELECT pd.pro_id, pd.pro_name,pd.pro_unit, SUM(ol.qty) as total_quantity, SUM(ol.sub_total) as total_income
            FROM tbl_payprove p
            JOIN tbl_order o ON p.order_id = o.order_id
            JOIN tbl_orderlist ol ON o.order_id = ol.order_id
            JOIN tbl_product pd ON ol.pro_id = pd.pro_id GROUP BY pd.pro_id, pd.pro_name ORDER BY total_quantity DESC,total_income DESC ";
        }

        $qr = $this->db->query($sql);
        return $qr->result();
    }



    public function PharmacistTask($data)
    {
        $day1 = isset($data['day1']) ? $data['day1'] : null;
        $day2 = isset($data['day2']) ? $data['day2'] : null;
        $adm_id = isset($data['admin']) ? $data['admin'] : null;
        $req_status = isset($data['req_status']) ? $data['req_status'] : null;

        $sql = "SELECT * FROM tbl_request r LEFT JOIN tbl_customer c ON r.cus_id = c.cus_id LEFT JOIN tbl_admin a ON r.adm_id = a.adm_id WHERE ";

        $conditions = [];

        // Add condition for day1 and day2
        if (!empty($day1) && !empty($day2)) {
            if ($day1 == $day2) {
                $conditions[] = "DATE(r.req_time) = '$day1'";
            } else {
                $conditions[] = "DATE(r.req_time) BETWEEN '$day1+00:00:00' AND '$day2+23:59:59'";
            }
        } elseif (!empty($day1)) {
            $conditions[] = "DATE(r.req_time) = '$day1'";
        } elseif (!empty($day2)) {
            $conditions[] = "DATE(r.req_time) = '$day2'";
        }

        // Add condition for adm_id
        if (!empty($adm_id)) {
            $conditions[] = "r.adm_id = '$adm_id'";
        }

        // Add condition for req_status
        if (!empty($req_status)) {
            $conditions[] = "r.req_status = '$req_status'";
        }

        // Combine all conditions with AND
        if (!empty($conditions)) {
            $sql .= implode(' AND ', $conditions) . ' ORDER BY r.req_modify DESC';
        } else {
            return null;
        }

        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function OrderReport($data)
    {
        $day1 = isset($data['day1']) ? $data['day1'] : null;
        $day2 = isset($data['day2']) ? $data['day2'] : null;
        $order_type = isset($data['order_type']) ? $data['order_type'] : null;
        $order_status = isset($data['order_status']) ? $data['order_status'] : null;

        $sql = "SELECT * FROM tbl_order o LEFT JOIN tbl_payprove p ON o.order_id = p.order_id 
        LEFT JOIN tbl_customer c ON o.cus_id = c.cus_id  LEFT JOIN tbl_admin a ON p.adm_id = a.adm_id WHERE ";

        $conditions = [];

        if (!empty($day1) && !empty($day2)) {
            if ($day1 == $day2) {
                $conditions[] = "DATE(o.order_datetime) = '$day1'";
            } else {
                $conditions[] = "DATE(o.order_datetime) BETWEEN '$day1+00:00:00' AND '$day2+23:59:59'";
            }   
        } elseif (!empty($day1)) {
            $conditions[] = "DATE(o.order_datetime) = '$day1'";
        } elseif (!empty($day2)) {
            $conditions[] = "DATE(o.order_datetime) = '$day2'";
        }

        if (!empty($order_type)) {
            $conditions[] = "o.order_type = '$order_type'";
        }

        if (!empty($order_status)) {
            if($order_status=="ยืนยันแล้ว"){
                $conditions[] = "o.order_status = '$order_status' || o.order_status = 'จัดส่งแล้ว'";
            }else{
                $conditions[] = "o.order_status = '$order_status'";
            }
           
        }

        if (!empty($conditions)) {
            $sql .= implode(' AND ', $conditions) . ' ORDER BY o.order_datetime DESC';
        } else {
            return null;
        }

        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function DeliveryReport($data)
    {
        $day1 = isset($data['day1']) ? $data['day1'] : null;
        $day2 = isset($data['day2']) ? $data['day2'] : null;

        $sql = "SELECT * FROM tbl_delivery d LEFT JOIN tbl_admin a ON d.adm_id = a.adm_id  WHERE ";

        $conditions = [];

        if (!empty($day1) && !empty($day2)) {
            if ($day1 == $day2) {
                $conditions[] = "DATE(d.delivery_datetime) = '$day1'";
            } else {
                $conditions[] = "DATE(d.delivery_datetime) BETWEEN '$day1+00:00:00' AND '$day2+23:59:59'";
            }
        } elseif (!empty($day1)) {
            $conditions[] = "DATE(d.delivery_datetime) = '$day1'";
        } elseif (!empty($day2)) {
            $conditions[] = "DATE(d.delivery_datetime) = '$day2'";
        }

        if (!empty($conditions)) {
            $sql .= implode(' AND ', $conditions) . ' ORDER BY d.delivery_datetime DESC';
        } else {
            $sql = "SELECT * FROM tbl_delivery d LEFT JOIN tbl_admin a ON d.adm_id = a.adm_id ORDER BY d.delivery_datetime DESC";
        }

        $qr = $this->db->query($sql);
        return $qr->result();
    }
    public function OrderlistReport($data)
    {
        $day1 = isset($data['day1']) ? $data['day1'] : null;
        $day2 = isset($data['day2']) ? $data['day2'] : null;
        $order_id = isset($data['order_id']) ? $data['order_id'] : null;


        $sql = "SELECT * FROM tbl_orderlist ol LEFT JOIN tbl_order o ON o.order_id = ol.order_id LEFT JOIN tbl_customer c ON o.cus_id = c.cus_id 
    LEFT JOIN tbl_product p ON p.pro_id = ol.pro_id WHERE ";

        $conditions = [];

        if (!empty($day1) && !empty($day2)) {
            if ($day1 == $day2) {
                $conditions[] = "DATE(o.order_datetime) = '$day1'";
            } else {
                $conditions[] = "DATE(o.order_datetime) BETWEEN '$day1+00:00:00' AND '$day2+23:59:59'";
            }
        } elseif (!empty($day1)) {
            $conditions[] = "DATE(o.order_datetime) = '$day1'";
        } elseif (!empty($day2)) {
            $conditions[] = "DATE(o.order_datetime) = '$day2'";
        }
        if (!empty($order_id)) {
            $conditions[] = "ol.order_id = '$order_id'";
        }
        $conditions[] = "o.order_status !='ชำระเงินแล้ว' AND o.order_status !='ยังไม่ชำระเงิน'";

        if (!empty($conditions)) {
            $sql .= implode(' AND ', $conditions) . ' ORDER BY o.order_datetime DESC';
        } else {
            $sql = "SELECT * FROM tbl_orderlist ol LEFT JOIN tbl_order o ON o.order_id = ol.order_id LEFT JOIN tbl_customer c ON o.cus_id = c.cus_id  
        LEFT JOIN tbl_product p ON p.pro_id = ol.pro_id WHERE o.order_status !='ยกเลิก' AND o.order_status !='ชำระเงินแล้ว'
    AND o.order_status !='ยังไม่ชำระเงิน' order by o.order_datetime DESC ";
        }

        $qr = $this->db->query($sql);
        $result = $qr->result();
        $grouped_result = array();

        foreach ($result as $item) {
            $grouped_result[$item->order_id][] = $item;
        }

        return $grouped_result;
    }
}
