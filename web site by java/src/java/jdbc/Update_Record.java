/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package jdbc;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import static jdbc.DBINFO.*;

/**
 *
 * @author yomna
 */
@WebServlet(name = "Update_Record", urlPatterns = {"/Update_Record"})
public class Update_Record extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet Update_Record</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet Update_Record at " + request.getContextPath() + "</h1>");
            out.println("</body>");
            out.println("</html>");
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {  
        response.setContentType("text/html;charset=UTF-8");
        Connection c=null;
       PreparedStatement s=null;
       try(PrintWriter out=response.getWriter()){
            Class.forName("com.mysql.jdbc.Driver");
            c=DriverManager.getConnection(URL,USERNAME,PASSWORD);
            String sql="update transactions set Oppress=?,cushion=? where Seepage=?";
            s=c.prepareStatement(sql);
            String oppress=request.getParameter("oppress");
            String seepage=request.getParameter("Seepage");
            String cushion=request.getParameter("cushion");
            s.setString(1,oppress);
            s.setString(2,cushion);
            s.setInt(3,Integer.parseInt(seepage));
            s.executeUpdate();
            out.println("new record is update");
       }
       catch (SQLException|ClassNotFoundException e) {
         try(PrintWriter out=response.getWriter()){
           out.println("Error"+e.getMessage());
        }   
           
        }
       finally{
        try{
        if(s!=null){
        s.close();
        }
        if(c!=null){
        c.close();
        }
        
        }   catch (SQLException e) {
            }
        }
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
