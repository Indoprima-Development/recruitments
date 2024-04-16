<?php

namespace App\Repository;

use App\Models\Qna;

class QnaRepository
{
    public static function QnaGetByExamId($exam_id){
        $redisKey = "recruitment_examId_$exam_id";
        $dataRedis = GetCacheRedis($redisKey);
        if ($dataRedis == null) {
            $qna = Qna::select('*')
            ->where('exam_id', $exam_id)
            ->get();

            SaveCacheRedis($redisKey, $qna);
            $dataRedis = $qna;
        }

        return $dataRedis;
    }
}
