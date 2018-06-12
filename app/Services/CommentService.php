<?php

namespace App\Services;
use Illuminate\Database\Eloquent\Collection;


class CommentService
{
    public function buildCommentTree($data){

        $tree = new Collection();

        foreach($data as $id => &$row){
            $r = &$row;
            if(empty($row->parent_id)) {
                $tree[$id] = $r;
            }
            else{
                //$data[$row['parent_id']]['child'] =  $r;
                /**
                 * https://laracasts.com/discuss/channels/eloquent/indirect-modification-of-overloaded-element
                 */
                $c = $data[$row['parent_id']]->child;
                $c[$id] = $r;
                $data[$row['parent_id']]->child = $c;
            }
        }
        return $tree;
    }
}