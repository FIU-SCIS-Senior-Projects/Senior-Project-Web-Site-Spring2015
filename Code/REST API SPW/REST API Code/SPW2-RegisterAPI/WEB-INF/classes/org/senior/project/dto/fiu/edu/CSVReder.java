package org.senior.project.dto.fiu.edu;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.StringTokenizer;

import javax.ws.rs.Path;
import javax.xml.bind.annotation.XmlRootElement;

//@Path("/CSVReder")
public class CSVReder {

	private String filePath ; 
	
	
	public CSVReder(String filePath)
	{
		this.filePath = filePath ; 		
	}
	
	public PantherUserInfo IsUserRegistered(String email)
	{
		String fileToParse = this.filePath;
		BufferedReader fileReader = null;
		PantherUserInfo current ; 
		
		//Delimiter used in CSV file
		final String DELIMITER = "::";
		try 
		{
			String line = "";
			//Create the file reader
			fileReader = new BufferedReader(new FileReader(fileToParse));			
			
			//Read the file line by line
			while ((line = fileReader.readLine()) != null) 
			{
				current = new PantherUserInfo();
				//Get all tokens available in line
				String[] tokens = line.split(DELIMITER);
				
				current.setEmail(tokens[0]); 
								
				if (! current.getEmail().equals(email.substring(0,  email.indexOf('@') ) ))
					continue ; 
				
				current.setId(tokens[1]);
				
				String [] names = tokens[2].split(" ") ;
				if(names.length >= 3  )
				{
					current.setFirstName(names[0]);
					current.setMiddle(names[1]); 
					current.setLastName(names[2]);
				}				
				else
				{
					current.setFirstName(names[0]);
					//current.setMiddle(names[1]); 
					current.setLastName(names[1]);
				}
				
				current.setValid(true) ; 
				
				return current;			
				
			}
		} 
		catch (Exception e) {
			e.printStackTrace();
		} 
		finally 
		{
			try {
				fileReader.close();
			} catch (IOException e) {
				e.printStackTrace();
			}
		}
		return new PantherUserInfo(false) ; 
	}
	
	public String getFilePath() {
		return filePath;
	}
	public void setFilePath(String filePath) {
		this.filePath = filePath;
	}
	
	public String getAllEmails()
	{
		String fileToParse = this.filePath;
		BufferedReader fileReader = null;
		String emailList = " " ; 
		
		//Delimiter used in CSV file
		String DELIMITER = "::";
		try 
		{
			String line = "";
			//Create the file reader
			fileReader = new BufferedReader(new FileReader(fileToParse));			
			
			//Read the file line by line
			while ((line = fileReader.readLine()) != null) 
			{
				
				//Get all tokens available in line
				String[] tokens = line.split(DELIMITER);
				emailList += "'" +  tokens[0] + "@fiu.edu' , " ; 				
				
			}
			return emailList.substring(0, emailList.length() -2) ;
			
		} 
		catch (Exception e) {
			e.printStackTrace();
		} 
		finally 
		{
			try {
				fileReader.close();
			} catch (IOException e) {
				e.printStackTrace();
			}
		}
		return ""; 
	}

	public List<PantherUserInfo> getAllUsers(boolean use_db) {
		Boolean b_connected = false;
		DBConnection d = new DBConnection();
		String fileToParse = this.filePath;		
		BufferedReader fileReader = null;
		PantherUserInfo current ; 
		List<PantherUserInfo> l = new ArrayList<PantherUserInfo>();
		if (use_db){			
			if (d.connect() == 0)
				b_connected = true;
		}
		
		//Delimiter used in CSV file
		String DELIMITER = "::";
		try 
		{
			String line = "";
			//Create the file reader
			fileReader = new BufferedReader(new FileReader(fileToParse));			
			
			//Read the file line by line
			while ((line = fileReader.readLine()) != null) 
			{
				current = new PantherUserInfo();
				//Get all tokens available in line
				String[] tokens = line.split(DELIMITER);
				
				current.setEmail(tokens[0]); 				
				current.setId(tokens[1]);
				
				String [] names = tokens[2].split(" ") ;
				if(names.length >= 3 )
				{
					current.setFirstName(names[0]);
					current.setMiddle(names[1]); 
					current.setLastName(names[2]);
				}				
				else
				{
					current.setFirstName(names[0]);
					//current.setMiddle(names[1]); 
					current.setLastName(names[1]);
				}
				
				current.setValid(true) ; 
				
				if (b_connected)
				{
					String title = d.fetchUserProjectTitle(current.getEmail() + "@fiu.edu");
                                        String id = d.fetchUserProjectId(current.getEmail() + "@fiu.edu");	

                                             
					current.setProjectTitle(title) ;
                                        current.setProjectID(id) ;
				}
				
				l.add(current);			
				
			}
		} 
		catch (Exception e) {
			e.printStackTrace();
		} 
		finally 
		{
			try {
				fileReader.close();
			} catch (IOException e) {
				e.printStackTrace();
			}
		}
		if (b_connected)
			d.disconnect();
		return l ;
	}
	

}
