<?php 
class sql_inject
{
var $urlRedirect;
var $bdestroy_session;
var $rq;
var $bLog;
function sql_inject($mLog=FALSE,$bdestroy_session=FALSE,$urlRedirect=FALSE)
{
$this->bLog = (($mLog!=FALSE)?$mLog:'');
$this->urlRedirect = (((trim($urlRedirect)!='') &&file_exists($urlRedirect))?$urlRedirect:'');
$this->bdestroy_session = $bdestroy_session;
$this->rq = '';
}
function test($sRQ)
{
$sRQ = strtolower($sRQ);
$this->rq = $sRQ;
$aValues = array();
$aTemp = array();
$aWords = array();
$aSep = array(' and ',' or ');
$sConditions = '(';
$matches = array();
$sSep = '';
if (is_int((strpos($sRQ,"#")))&&$this->_in_post('#')) return $this->detect();
if (is_int(strpos($sRQ,';'))){
$aTemp = explode(';',$sRQ);
if ($this->_in_post($aTemp[1])) return $this->detect();
}
$aTemp = explode(" where ",$sRQ);
if (count($aTemp)==1) return FALSE;
$sConditions = $aTemp[1];
$aWords = explode(" ",$sConditions);
if(strcasecmp($aWords[0],'select')!=0) $aSep[] = ',';
$sSep = '('.implode('|',$aSep).')';
$aValues = preg_split($sSep,$sConditions,-1,PREG_SPLIT_NO_EMPTY);
foreach($aValues as $i =>$v)
{
if (is_int(strpos($v,'=')))
{
$aTemp = explode('=',$v);
if (trim($aTemp[0])==trim($aTemp[1])) return $this->detect();
}
if (is_int(strpos($v,'<>')))
{
$aTemp = explode('<>',$v);
if ((trim($aTemp[0])!=trim($aTemp[1]))&&($this->_in_post('<>'))) return $this->detect();
}
if (is_int(strpos($v,'--')))
{
return $this->detect();
}
if (is_int(strpos($v,';')))
{
return $this->detect();
}
}
if (strpos($sConditions,' null'))
{
if (preg_match("/null +is +null/",$sConditions)) return $this->detect();
if (preg_match("/is +not +null/",$sConditions,$matches))
{
foreach($matches as $i =>$v)
{
if ($this->_in_post($v))return $this->detect();
}
}
}
if (preg_match("/[a-z0-9]+ +between +[a-z0-9]+ +and +[a-z0-9]+/",$sConditions,$matches))
{
$Temp = explode(' between ',$matches[0]);
$Evaluate = $Temp[0];
$Temp = explode(' and ',$Temp[1]);
if ((strcasecmp($Evaluate,$Temp[0])>0) &&(strcasecmp($Evaluate,$Temp[1])<0) &&$this->_in_post($matches[0])) return $this->detect();
}
return FALSE;
}
function _in_post($value)
{
foreach($_POST as $i =>$v)
{
if (is_int(strpos(strtolower($v),$value))) return TRUE;
}
return FALSE;
}
function detect()
{
if ($this->bLog)
{
$fp = @fopen($this->bLog,'a+');
if ($fp)
{
fputs($fp,"\r\n".date("d-m-Y H:i:s").' ['.$this->rq.'] from '.$this->sIp = getenv("REMOTE_ADDR"));
fclose($fp);
}
}
if ($this->bdestroy_session) session_destroy();
if ($this->urlRedirect!=''){
exit("<script>document.location='$this->urlRedirect'</script>");
}
return TRUE;
}
function protect1($protected) {
$banlist = array ("'","shutdown","or ","--","or=","del ","[",")--","Character","dbo","WHERE","Set ","]","\"","<","\\","|","/","=","insert","select","update","delete","distinct","having","truncate","'","replace","handler","like","procedure","limit","order by","group by","asc","warehouse","DEL ","$","sele","+","+ dx"," dx","memb_info","desc");
if ( eregi ( "[a-zA-Z0-9@]+",$protected ) ) {
$protected = trim(str_replace($banlist,'',$protected));
return $protected;
}else {
echo $protected;
die ( ' Is invalid for that spot, please try a different entry.');
}
}
function protect2($protected) {
$banlist = array ("'","shutdown","or","--","or=","del","[",")--","Character","dbo","WHERE","Set","]","\"",">","<","\\","|","/","=","insert","select","update","delete","distinct","having","truncate","'","replace","handler","like","procedure","limit","order by","group by","asc","warehouse","DEL","$","sele"," +"," + ","+","+ dx"," dx","memb_info","desc");
if ( eregi ( "[0-9]+",$protected ) ) {
$protected = trim(str_replace($banlist,'',$protected));
return $protected;
}else {
echo $protected;
die ( ' Caracteres Invalidos');
}
}
}
;echo '
'; ?>