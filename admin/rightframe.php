<?
 session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../style/css.css" type="text/css">
<title>�˵�����</title>
</head>
<body>
<?
if ($_SESSION['usertype']=="����Ա") {
?>
<table width="550" height="199"  cellpadding="5" cellspacing="0">
  <tr> 
    <td><font color="#0000FF">����Ա�˵�˵��</font></td>
  </tr>
  <tr> 
    <td><ul>
        <li>�γ̹����������ӡ�ɾ�����޸Ŀγ̡�</li>
      </ul></td>
  </tr>
  <tr> 
    <td><ul>
        <li>���ð༶���������ӡ�ɾ�����޸İ༶��</li>
      </ul></td>
  </tr>
  <tr> 
    <td><ul>
        <li>ѧ�������������ӡ�ɾ�����޸�ѧ��������Ϣ��</li>
      </ul></td>
  </tr>
  <tr> 
    <td><ul>
        <li>��ʦ�����������ӡ�ɾ�����޸Ľ�ʦ�û���Ϣ��</li>
      </ul></td>
  </tr>
  <tr> 
    <td><ul>
        <li>Ȩ�ޣ����ӡ�ɾ�����޸Ĺ���Ա��Ϣ</li>
      </ul></td>
  </tr>
  <tr> 
    <td><ul>
        <li>��������ʾ���˵�˵��</li>
      </ul></td>
  </tr>
</table>
<?
} else {
?>
<table width="550" height="156"  cellpadding="5" cellspacing="0">
  <tr> 
    <td height="28"><font color="#0000FF">��ʦ�˵�˵��</font></td>
  </tr>
  <tr> 
    <td height="27">
<ul>
        <li>������ҵ�� �������ӡ�ɾ�����޸ġ�</li>
      </ul></td>
  </tr>
  <tr> 
    <td height="32">
<ul>
        <li>������ҵ ��</li>
      </ul></td>
  </tr>
  <tr> 
    <td height="23">
<ul>
        <li>����ɼ��� ���༶������γ̵Ŀ��Գɼ���</li>
      </ul></td>
  </tr>
  <tr> 
    <td height="20">
<ul>
        <li>�޸����룺�޸��û������롣</li>
      </ul></td>
  </tr>
</table>
<?
}
?>
</body>
</html>
