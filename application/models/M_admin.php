<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

    public function getDataGrafik_satu()
    {
        $sql = "SELECT IFNULL(tb_visitors.count_visitors, 0) AS count_visitors, months.month_name
        FROM
        (
          SELECT 1 AS MONTH, 'January' AS month_name UNION SELECT 2 AS MONTH, 'February' AS month_name UNION SELECT 3 AS MONTH, 'March' AS month_name UNION SELECT 4 AS MONTH, 'April' AS month_name UNION
          SELECT 5 AS MONTH, 'May' AS month_name UNION SELECT 6 AS MONTH, 'June' AS month_name UNION SELECT 7 AS MONTH, 'July' AS month_name UNION SELECT 8 AS MONTH, 'August' AS month_name UNION
          SELECT 9 AS MONTH, 'September' AS month_name UNION SELECT 10 AS MONTH, 'October' AS month_name UNION SELECT 11 AS MONTH, 'November' AS month_name UNION SELECT 12 AS MONTH, 'December' AS month_name
        ) months
        LEFT JOIN
        (
          SELECT COUNT(token) AS count_visitors, MONTH(FROM_UNIXTIME(date_created)) AS MONTH
          FROM tb_visitors 
          WHERE location = 'Showroom 75' AND YEAR(FROM_UNIXTIME(date_created)) = YEAR(CURRENT_DATE())
          GROUP BY MONTH(FROM_UNIXTIME(date_created))
        ) tb_visitors ON months.month = tb_visitors.month
        GROUP BY months.month_name
        ORDER BY months.month ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function getDataGrafik_dua()
    {
        $sql = "SELECT IFNULL(tb_visitors.count_visitors, 0) AS count_visitors, months.month_name
        FROM
        (
          SELECT 1 AS MONTH, 'January' AS month_name UNION SELECT 2 AS MONTH, 'February' AS month_name UNION SELECT 3 AS MONTH, 'March' AS month_name UNION SELECT 4 AS MONTH, 'April' AS month_name UNION
          SELECT 5 AS MONTH, 'May' AS month_name UNION SELECT 6 AS MONTH, 'June' AS month_name UNION SELECT 7 AS MONTH, 'July' AS month_name UNION SELECT 8 AS MONTH, 'August' AS month_name UNION
          SELECT 9 AS MONTH, 'September' AS month_name UNION SELECT 10 AS MONTH, 'October' AS month_name UNION SELECT 11 AS MONTH, 'November' AS month_name UNION SELECT 12 AS MONTH, 'December' AS month_name
        ) months
        LEFT JOIN
        (
          SELECT COUNT(token) AS count_visitors, MONTH(FROM_UNIXTIME(date_created)) AS MONTH
          FROM tb_visitors 
          WHERE location = 'Showroom 118' AND YEAR(FROM_UNIXTIME(date_created)) = YEAR(CURRENT_DATE())
          GROUP BY MONTH(FROM_UNIXTIME(date_created))
        ) tb_visitors ON months.month = tb_visitors.month
        GROUP BY months.month_name
        ORDER BY months.month ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function getDataGrafik_tiga()
    {
        $sql = "SELECT IFNULL(tb_visitors.count_visitors, 0) AS count_visitors, months.month_name
        FROM
        (
          SELECT 1 AS MONTH, 'January' AS month_name UNION SELECT 2 AS MONTH, 'February' AS month_name UNION SELECT 3 AS MONTH, 'March' AS month_name UNION SELECT 4 AS MONTH, 'April' AS month_name UNION
          SELECT 5 AS MONTH, 'May' AS month_name UNION SELECT 6 AS MONTH, 'June' AS month_name UNION SELECT 7 AS MONTH, 'July' AS month_name UNION SELECT 8 AS MONTH, 'August' AS month_name UNION
          SELECT 9 AS MONTH, 'September' AS month_name UNION SELECT 10 AS MONTH, 'October' AS month_name UNION SELECT 11 AS MONTH, 'November' AS month_name UNION SELECT 12 AS MONTH, 'December' AS month_name
        ) months
        LEFT JOIN
        (
          SELECT COUNT(token) AS count_visitors, MONTH(FROM_UNIXTIME(date_created)) AS MONTH
          FROM tb_visitors 
          WHERE location = 'Joongla x Mr Kitchen' AND YEAR(FROM_UNIXTIME(date_created)) = YEAR(CURRENT_DATE())
          GROUP BY MONTH(FROM_UNIXTIME(date_created))
        ) tb_visitors ON months.month = tb_visitors.month
        GROUP BY months.month_name
        ORDER BY months.month ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function getDataGrafik_emp()
    {
        $sql = "SELECT IFNULL(tb_visitors.count_visitors, 0) AS count_visitors, months.month_name
        FROM
        (
          SELECT 1 AS MONTH, 'January' AS month_name UNION SELECT 2 AS MONTH, 'February' AS month_name UNION SELECT 3 AS MONTH, 'March' AS month_name UNION SELECT 4 AS MONTH, 'April' AS month_name UNION
          SELECT 5 AS MONTH, 'May' AS month_name UNION SELECT 6 AS MONTH, 'June' AS month_name UNION SELECT 7 AS MONTH, 'July' AS month_name UNION SELECT 8 AS MONTH, 'August' AS month_name UNION
          SELECT 9 AS MONTH, 'September' AS month_name UNION SELECT 10 AS MONTH, 'October' AS month_name UNION SELECT 11 AS MONTH, 'November' AS month_name UNION SELECT 12 AS MONTH, 'December' AS month_name
        ) months
        LEFT JOIN
        (
          SELECT COUNT(token) AS count_visitors, MONTH(FROM_UNIXTIME(date_created)) AS MONTH
          FROM tb_visitors 
          WHERE location = 'Website' AND YEAR(FROM_UNIXTIME(date_created)) = YEAR(CURRENT_DATE())
          GROUP BY MONTH(FROM_UNIXTIME(date_created))
        ) tb_visitors ON months.month = tb_visitors.month
        GROUP BY months.month_name
        ORDER BY months.month ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
