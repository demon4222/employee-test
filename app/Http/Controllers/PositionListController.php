<?php

namespace App\Http\Controllers;

use App\Models\Position\Position;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PositionListController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Datatables::of(Position::query())
            ->addColumn('action', function ($position) {
                $button = '<div class="d-flex">';
                $button .= '<a href="' . route('positions.edit', $position). '" class="btn btn-primary mr-3"><i class="fa fa-edit fa-fw"></i></a>';
                $button .= '<a href="#deleteModal" data-target="deleteModal" data-toggle="modal" data-id="' . $position->id . '" class="btn btn-danger deleteButton"><i class="fas fa-trash-alt"></i></a>';
                $button .= '</div>';
                return $button;
            })
            ->editColumn('updated_at', function ($position) {
                return Carbon::parse($position->updated_at)->format('d.m.Y');
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
