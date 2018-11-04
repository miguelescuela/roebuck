<?php
$find = $fm -> newFindCommand('Reportes_MES');
$find -> addFindCriterion('RM_mesano', $busq);
$find->addSortRule('_RM_id', 1, FILEMAKER_SORT_ASCEND);

$result = $find -> execute();
?>