package org.senior.project.fiu.edu;

import java.io.IOException;
import java.util.ArrayList;

import java.util.Properties;
import java.util.List;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;

import org.senior.project.dto.fiu.edu.CSVReder;
import org.senior.project.dto.fiu.edu.DBConnection;
import org.senior.project.dto.fiu.edu.PantherUserInfo;
import org.senior.project.dto.fiu.edu.Project;
import org.senior.project.properties.fiu.edu.PropertyLoader;
import org.senior.project.dto.fiu.edu.Util;

//import com.mysql.jdbc.Util;



@Path("/SPWRegister")
public class SPWRegister {

	
	
	@GET
	@Path("/getUserInfo/{token}/{email}")
	@Produces("application/json")	
	public PantherUserInfo getUserInfo(@PathParam("email") String email  , @PathParam("token") String token)  {
		
		
		if (! email.endsWith("@fiu.edu") )
			return new PantherUserInfo(false); 
		
		
		String s_token = Util.GetProperty("token");
		
		if ( ! s_token.equals(token) )
			return new PantherUserInfo(false); 
		
		CSVReder reader = new CSVReder( Util.GetProperty("filePath")) ; 
		
		return reader.IsUserRegistered(email) ; 
		//http://localhost:8080/SPW2-RegisterAPI/rest/SPWRegister/getUserInfo/123FIUspw/ncapo006@fiu.edu
		
	}

	@GET
	@Path("/getAll/{token}")
	@Produces("application/json")	
	public List< PantherUserInfo > getALLUsersInfo( @PathParam("token") String token)  {
				
		
		String s_token =  Util.GetProperty("token") ;
		
		if ( ! s_token.equals(token) )
			return null; 
		
		CSVReder reader = new CSVReder( Util.GetProperty("filePath")) ; 

		return reader.getAllUsers(true);	
		//http://localhost:8080/SPW2-RegisterAPI/rest/SPWRegister/getAll/123FIUspw
		
	}
	
	@GET
	@Path("/refresh/{token}")
	//@Produces(String)
	public String refresh( @PathParam("token") String token)  {
		try {
			//System.out.println("Run");
			DBConnection d = new DBConnection();
			if (d.connect() == 0 )
			{
				d.updateStatusAll() ;
				d.createNewProfiles();
				d.disconnect();
				return "OK";
			}
		} catch (Exception e) {
			e.printStackTrace();			
		}
		return "ERROR";
		//http://localhost:8080/SPW2-RegisterAPI/rest/SPWRegister/getAll/123FIUspw
		
	}
        @GET
	@Path("/getProjects/{token}")
	@Produces("application/json")	
	public List<Project> getAllprojects( @PathParam("token") String token)  {
            
            List<Project> allProjects = new ArrayList<Project>();
            
            try {
			//System.out.println("Run");
			DBConnection d = new DBConnection();
			if (d.connect() == 0 )
			{
				allProjects = d.fetchProjects();
			}
		} catch (Exception e) {
			e.printStackTrace();			
		}
		return allProjects;
            
        }
        
	
	
	
}







