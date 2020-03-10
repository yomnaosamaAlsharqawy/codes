<%-- 
    Document   : insertrecord
    Created on : Apr 15, 2018, 7:24:20 AM
    Author     : yomna
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>insert record</title>
    </head>
    <body>
        <h2>Insert Record</h2>
        <form action='Insert_Record' method='post'>
            Oppress:<input name='oppress' size='50'>
            <br><br>
            Seepage:<input name='seepage' size='50'>
            <br><br>
            Cushion:<input name='cushion' size='50'>
            <br><br>
            <input type='submit' value='Insert'>
            <br><br>
        </form>
    </body>
</html> 