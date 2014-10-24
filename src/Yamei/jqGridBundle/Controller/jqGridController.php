<?php

namespace Yamei\jqGridBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class jqGridController extends Controller{

	/**
	 * build common response for grid in JSON
	 * @param  [type] $request
	 * @param  string $countSqlQuery 		query to get count, should be only on row and onr column called 'count'
	 * @param  string $dataSqlQuery			query to get data, should be without GROUP BY section
	 * @param  boolean $doNotMakeRowsCells if set True - will not build 'rows' content as needed for jqGrid and will put to response plain data received from the query
	 * @param  boolean buildHierarcyTree   if set True - then we need to slice the data after we build the array tree from data returned by query
	 *                                     			that is needed to fetch ALL the data, build the tree, and only then slice needed part
	 *                                     If this flag used - function depends at ArrayController of Yamei UtilsBundle
	 * @return array 	return prebuild response array in needed form 
	 */
	public function buildResponse($request,$countSqlQuery,$dataSqlQuery,$doNotMakeRowsCells = false,$buildHierarcyTree = false, $pid = 0, $buldOnAllPID = false){
		$page  = $request->request->get('page');
		$limit = $request->request->get('rows');
		$sidx  = $request->request->get('sidx');
		$sord  = $request->request->get('sord');

		if (!$sidx) $sidx = 1;

		$mgr = $this->getDoctrine()->getManager();
		
		$stmt = $mgr->getConnection()->prepare($countSqlQuery);
		$stmt->execute();
		$count = $stmt->fetch();
		$count = $count['count'];

		if ($count > 0){
			$total_pages = ceil($count/$limit);
		}else{
			$total_pages = 0;
		}
		if ($page > $total_pages && $total_pages != 0) $page=$total_pages;

		$start = $limit*$page - $limit;

	
		$stmtQuery =  "$dataSqlQuery ORDER BY $sidx $sord";
		
		if (!$buildHierarcyTree)
			$stmtQuery .= " LIMIT $start , $limit";

		$stmt = $mgr->getConnection()->prepare($stmtQuery);
		$stmt->execute();
		$rows= $stmt->fetchAll();

		if ($buildHierarcyTree){
			$treeArray = array();
			if ($buldOnAllPID === true)
				$this->get('yamei_utils_array')->preBuildHierarchyArrayTree($pid,$rows,$treeArray);
			else 
				$this->get('yamei_utils_array')->buildHierarchyArrayTree($pid,$rows,$treeArray);

			$count = count($treeArray);			
			if ($count > 0){
				$total_pages = ceil($count/$limit);
			}else{
				$total_pages = 0;
			}
			if ($page > $total_pages && $total_pages != 0) $page=$total_pages;
			$start = $limit*$page - $limit;

			$rows = array_slice($treeArray, $start, $limit, true);
		}
			$output = array(
			'page'		=> $page,
			'total'		=> $total_pages,
			'records'	=> $count,
			'rows'	=> array()
			);


		if ($doNotMakeRowsCells){
			$output['rows'] = $rows;
		}else{
			$i = 0;
			foreach ($rows as $row) {
				$output['rows'][$i]['id'] = $row['id'];
				$output['rows'][$i]['cell'] = $row;
				$i++;
			}		
		}

		return $output;
	}
        
         /**
         * build all data response
         * @param request $request
         * @param type $countSqlQuery
         * @param type $dataSqlQuery
         * @param type $doNotMakeRowsCells
         * @param type $buildHierarcyTree
         * @param type $pid
         * @param type $buldOnAllPID
         * @return type
         */
        public function buildAllDataResponse($request,$countSqlQuery,$dataSqlQuery,$doNotMakeRowsCells = false,$buildHierarcyTree = false, $pid = 0, $buldOnAllPID = false){
		$sidx  = $request->request->get('sidx');
                $page  = $request->request->get('page');
		$sord  = $request->request->get('sord');
		if (!$sidx) $sidx = 1;
		$mgr = $this->getDoctrine()->getManager();
		
		$stmt = $mgr->getConnection()->prepare($countSqlQuery);
		$stmt->execute();
		$count = $stmt->fetch();
		$count = $count['count'];
		$stmtQuery =  "$dataSqlQuery ORDER BY $sidx $sord";
		
		$stmt = $mgr->getConnection()->prepare($stmtQuery);
		$stmt->execute();
		$rows= $stmt->fetchAll();
			$output = array(
			'page'		=> $page,
			//'total'		=> '0',
			'records'	=> $count,
			'rows'	=> array()
			);
		if ($doNotMakeRowsCells){
			$output['rows'] = $rows;
		}else{
			$i = 0;
			foreach ($rows as $row) {
				$output['rows'][$i]['id'] = $row['id'];
				$output['rows'][$i]['cell'] = $row;
				$i++;
			}		
		}

		return $output;
	}
}
