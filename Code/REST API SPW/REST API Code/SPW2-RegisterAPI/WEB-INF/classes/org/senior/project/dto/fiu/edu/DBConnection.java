package org.senior.project.dto.fiu.edu;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

public class DBConnection
{
  private String dbAddr;
  private String username;
  private String password;
  private Connection myCon;

  public DBConnection()
  {
    this.dbAddr = Util.GetProperty("dbAddr");
    this.username = Util.GetProperty("DBusername");
    this.password = Util.GetProperty("DBpassword");
  }

  public int connect()
  {
    try
    {
      Class.forName("com.mysql.jdbc.Driver");
      this.myCon = DriverManager.getConnection(this.dbAddr, this.username, this.password);
    }
    catch (Exception e) {
      e.printStackTrace();
      return -1;
    }

    return 0;
  }

  public int disconnect() {
    if (this.myCon != null) {
      try {
        this.myCon.close();
      }
      catch (Exception e) {
        e.printStackTrace();
        return -1;
      }
    }
    return 0;
  }

  public String fetchUserProjectTitle(String email)
  {
    try {
      Statement s = this.myCon.createStatement();

      s.executeQuery("SELECT spw_project.title FROM spw_project, spw_user WHERE spw_user.email = '" + email + "'\tAND spw_project.id = spw_user.project ;");

      ResultSet res = s.getResultSet();
      if (res.next())
        return res.getString("title");
    }
    catch (Exception e)
    {
      e.printStackTrace();
      return "";
    }
    return "";
  }
  public String fetchUserProjectId(String email)
  {
    try {
      Statement s = this.myCon.createStatement();

      s.executeQuery("SELECT spw_project.id  FROM spw_project, spw_user WHERE spw_user.email = '" + email + "'\tAND spw_project.id = spw_user.project ;");

      ResultSet res = s.getResultSet();
      if (res.next())
        return res.getString("id");
    }
    catch (Exception e)
    {
      e.printStackTrace();
      return "";
    }
    return "";
  }

  public void createNewProfiles()
  {
    try
    {
      Statement s = this.myCon.createStatement();

      CSVReder reader = new CSVReder(Util.GetProperty("filePath"));

      List l = reader.getAllUsers(false);

      for (int i = 0; i < l.size(); i++)
      {
        s.executeQuery("SELECT id  FROM  spw_user WHERE email = '" + ((PantherUserInfo)l.get(i)).getEmail() + "@fiu.edu' ");

        ResultSet res = s.getResultSet();
        if (!res.next())
        {
          PreparedStatement insertStmt = null;

          String updateString = "INSERT INTO spw_user ( first_name , last_name , email , status ,role  ) values ( ? , ? , ? , 'ACTIVE' , 'STUDENT' ) ";

          insertStmt = this.myCon.prepareStatement(updateString);
          insertStmt.setString(1, ((PantherUserInfo)l.get(i)).getFirstName().substring(0, 1).toUpperCase() + ((PantherUserInfo)l.get(i)).getFirstName().substring(1));
          insertStmt.setString(2, ((PantherUserInfo)l.get(i)).getLastName().substring(0, 1).toUpperCase() + ((PantherUserInfo)l.get(i)).getLastName().substring(1));
          insertStmt.setString(3, ((PantherUserInfo)l.get(i)).getEmail() + "@fiu.edu");

          insertStmt.executeUpdate();
        }
      }
    }
    catch (Exception e)
    {
      e.printStackTrace();
      return;
    }
  }

  public void updateStatusAll()
  {
    String emailList = "";

    CSVReder reader = new CSVReder(Util.GetProperty("filePath"));
    emailList = reader.getAllEmails();
    try
    {
      Statement s = this.myCon.createStatement();

      String sql = "UPDATE  spw_user SET status = 'ACTIVE'  WHERE email  in ( " + emailList + " ) and role = 'STUDENT' ;  ";

      s.executeUpdate(sql);

      sql = "UPDATE  spw_user SET status = 'INACTIVE'  WHERE email not in ( " + emailList + " ) and role = 'STUDENT' ;  ";

      s.executeUpdate(sql);
    }
    catch (Exception e)
    {
      e.printStackTrace();
    }
  }

  public List<Project> fetchProjects()
  {
    List all = new ArrayList();
    try {
      Statement s = this.myCon.createStatement();

      s.executeQuery("select spw_project.id,spw_user.id, first_name, last_name, title, description, proposed_by\n" +
"from spw_project , spw_user\n" +
"where spw_project.status = 'APPROVED' and mentor = spw_user.id ");

      ResultSet res = s.getResultSet();
      while (res.next()) {
        String project_id = res.getString(1);
        String mentor_id = res.getString(2);
        String mentor_firstname = res.getString(3);
        String mentor_lastname = res.getString(4);
        String title = res.getString(5);
        String description = res.getString(6);
        String proposed_by = res.getString(7);

        
        all.add(new Project(project_id,mentor_id,mentor_firstname,mentor_lastname,title,description, proposed_by));
      }

    }
    catch (Exception e)
    {
      e.printStackTrace();
    }
    return all;
  }
  
  
 
}