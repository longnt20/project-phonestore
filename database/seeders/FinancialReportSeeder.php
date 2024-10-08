<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinancialReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
        {
            // Lấy dữ liệu sales
            $sales = DB::table('sales')
                ->select(DB::raw('SUM(total) as total_sales'), 
                        DB::raw('EXTRACT(MONTH FROM sale_date) as month'), 
                        DB::raw('EXTRACT(YEAR FROM sale_date) as year'))
                ->groupBy(DB::raw('EXTRACT(MONTH FROM sale_date)'), 
                        DB::raw('EXTRACT(YEAR FROM sale_date)'))
                ->get();
    
            // Lấy dữ liệu expenses
            $expenses = DB::table('expenses')
                ->select(DB::raw('SUM(amount) as total_expenses'), 
                        DB::raw('EXTRACT(MONTH FROM expense_date) as month'), 
                        DB::raw('EXTRACT(YEAR FROM expense_date) as year'))
                ->groupBy(DB::raw('EXTRACT(MONTH FROM expense_date)'), 
                        DB::raw('EXTRACT(YEAR FROM expense_date)'))
                ->get()
                ->keyBy(function($item) {
                    return $item->month . '-' . $item->year;
                }); // Tạo collection và dùng keyBy để nhóm dữ liệu theo month và year
    
            // Lấy giá trị VAT
            $rate = DB::table('taxes')
                ->where('tax_name', 'VAT')
                ->value('rate');  // Chỉ lấy giá trị của VAT
    
            // Lặp qua sales để tạo báo cáo tài chính
            foreach ($sales as $sale) {
                $expenseKey = $sale->month . '-' . $sale->year;
                $expense = $expenses->get($expenseKey);
    
                // Tính toán profit trước thuế và thuế
                $total_sales = $sale->total_sales;
                $total_expenses = $expense->total_expenses ?? 0;  // Nếu không tìm thấy expense, giá trị mặc định là 0
                $profit_before_tax = $total_sales - $total_expenses;
                $tax_amount = $profit_before_tax * ($rate / 100); // Tính tiền thuế
                $profit_after_tax = $profit_before_tax - $tax_amount;
    
                // Chèn vào bảng financial_reports
                DB::table('financial_reports')->insert([
                    'month' => $sale->month,
                    'year'  => $sale->year,
                    'total_sales' => $total_sales,
                    'total_expenses' => $total_expenses,
                    'profit_before_tax' => $profit_before_tax,
                    'tax_amount' => $tax_amount,
                    'profit_after_tax' => $profit_after_tax,
                ]);
            }
    }
}
