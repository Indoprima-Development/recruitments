<?php

namespace App\Repository;

use App\Models\Qna_transaction;

class QnaTransactionRepository
{
    public static function CreateOrUpdate($examId,$qna_id,$answer,$is_true,$user_id){
        $qna_transaction = Qna_transaction::where('user_id', $user_id)->where('qna_id', $qna_id)->first();
        if (empty($qna_transaction)) {
            $qna_transaction = Qna_transaction::create([
                "qna_id"    => $qna_id,
                "user_id"   => $user_id,
                "answer"    => $answer,
                "is_true"   => $is_true,
            ]);
        } else {
            $qna_transaction->update([
                "answer"    => $answer,
                "is_true"   => $is_true,
            ]);
        }

        $redisKey = "recruitment_Qna_transaction_$examId"."_$user_id";
        $dataRedis = GetCacheRedis($redisKey);
        $dataRedis[$qna_id] = $qna_transaction;
        SaveCacheRedis($redisKey, $dataRedis);

        return $dataRedis;
    }

    public static function GetByExamIdAndUserId($exam_id,$user_id){
        $redisKey = "recruitment_Qna_transaction_$exam_id"."_$user_id";
        $dataRedis = GetCacheRedis($redisKey);
        if ($dataRedis == null) {
            $qnaTransactions = Qna_transaction::select('qna_transactions.*')
            ->join('qnas','qnas.id','qna_transactions.qna_id')
            ->where('qnas.exam_id', $exam_id)
            ->where('qna_transactions.user_id', $user_id)
            ->get();

            $dataRedis = [];
            foreach ($qnaTransactions as  $qt) {
                $dataRedis[$qt->qna_id] = $qt;
            }
            SaveCacheRedis($redisKey, $dataRedis);
        }

        return $dataRedis;
    }
}
