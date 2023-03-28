<?php
class BookingPackage
{
    public function __construct()
    {
    }
    public function add_To_Package($id_tour, $name_tour, $price_tour, $sale, $number_people, $image_tour, $name_country)
    {
        $tour = new Tourist();
        $tourist = $tour->getDetailsTourist($id_tour);

        $icon_transport = $tourist['ICON'];
        $transport = $tourist['NAME_TRANSPORT'];
        $start_date = $tourist['START_DATE'];
        $end_date = $tourist['END_DATE'];

        $total_item = 0;
        if (isset($price_tour) && isset($number_people) && isset($sale)) {
            $total_item = $this->Total_Item($price_tour, $number_people, $sale);
        }


        $item = array(
            'id' => $id_tour,
            'nametour' => $name_tour,
            'pricetour' => $price_tour,
            'startdate' => $start_date,
            'enddate' => $end_date,
            'sale' => $sale,
            'numberpeople' => $number_people,
            'image' => $image_tour,
            'totalitem' => $total_item,
            'namecountry' => $name_country,
            'icontransport' => $icon_transport,
            'transport' => $transport,
        );

        $_SESSION['package'][] = $item;

    }

    public function Total_Item($price, $quantity, $sale)
    {
        if ($sale > 0) {
            return $sale * $quantity;
        } else {
            return $price * $quantity;
        }

    }

    public function Delete_Item($key)
    {
        if ($_SESSION['package'][$key]['numberpeople'] > 1) {
            $_SESSION['package'][$key]['numberpeople'] = $_SESSION['package'][$key]['numberpeople'] - 1;
            $new_total = $this->Total_Item($_SESSION['package'][$key]['pricetour'], $_SESSION['package'][$key]['numberpeople'], $_SESSION['package'][$key]['sale']);
            $_SESSION['package'][$key]['totalitem'] = $new_total;
        } else {
            unset($_SESSION['package'][$key]);
        }
    }

    public function Exists_Item($key, $quantity)
    {
        $_SESSION['package'][$key]['numberpeople'] = $_SESSION['package'][$key]['numberpeople'] + $quantity;
        $new_total = $this->Total_Item($_SESSION['package'][$key]['pricetour'], $_SESSION['package'][$key]['numberpeople'], $_SESSION['package'][$key]['sale']);
        $_SESSION['package'][$key]['totalitem'] = $new_total;
    }

    public function Update_Item($key, $quantity)
    {
        if ($quantity <= 0) {
            $this->Delete_Item($key);
        } else {
            $_SESSION['package'][$key]['numberpeople'] = $quantity;
            $new_total = $this->Total_Item($_SESSION['package'][$key]['pricetour'], $_SESSION['package'][$key]['numberpeople'], $_SESSION['package'][$key]['sale']);
            $_SESSION['package'][$key]['totalitem'] = $new_total;
        }
    }

    public function getTotalPackage()
    {
        $totalPackage = 0;
        if (isset($_SESSION['package'])) {
            foreach ($_SESSION['package'] as $value) {
                $totalPackage += $value['totalitem'];
            }
        }
        if (!empty($_SESSION['usePoint'])) {
            $totalPackage -= $_SESSION['usePoint'];
        }
        return $totalPackage;
    }
}