<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $post = [
            [
                'title' => 'Covid',
                'image' => 'Covid.jpg',
                'content' => 'Báo cáo của Bộ Y tế cũng cho biết mặc dù đã qua đỉnh dịch, số mắc ngày 29-3 chỉ bằng chưa đầy 30% của thời điểm cao nhất, nhưng Hà Nội vẫn ghi nhận xấp xỉ 9.000 ca mới trong ngày.',
                'featured' => 1,
                'user_id' => 1,
                'categories_id' => 1,
            ],
            [
                'title' => 'Tội phạm',
                'image' => 'Covid.jpg',
                'content' => 'Nhà chức trách cho rằng Chủ tịch FLC Trịnh Văn Quyết điều hành nhân viên dùng 20 tài khoản chứng khoán liên tục mua bán tạo ra cung cầu giả nhằm giao dịch chui hơn 1.689 tỷ đồng.',
                'featured' => 1,
                'featured' => 1,
                'user_id' => 2,
                'categories_id' => 2,
            ],
            [
                'title' => 'Covid',
                'image' => 'Covid.jpg',
                'content' => 'Báo cáo của Bộ Y tế cũng cho biết mặc dù đã qua đỉnh dịch, số mắc ngày 29-3 chỉ bằng chưa đầy 30% của thời điểm cao nhất, nhưng Hà Nội vẫn ghi nhận xấp xỉ 9.000 ca mới trong ngày.',
                'featured' => 1,
                'user_id' => 1,
                'categories_id' => 1,
            ],
            [
                'title' => 'Covid',
                'image' => 'Covid.jpg',
                'content' => 'Báo cáo của Bộ Y tế cũng cho biết mặc dù đã qua đỉnh dịch, số mắc ngày 29-3 chỉ bằng chưa đầy 30% của thời điểm cao nhất, nhưng Hà Nội vẫn ghi nhận xấp xỉ 9.000 ca mới trong ngày.',
                'featured' => 1,
                'user_id' => 1,
                'categories_id' => 1,
            ],
        ];
        DB::table('posts')->insert($post);
    }
}
